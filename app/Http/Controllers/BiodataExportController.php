<?php

namespace App\Http\Controllers;

use App\Http\Resources\RegistrantSingleResource;
use App\Models\RegistrantActivity;
use App\Models\RegistrationStatus;
use App\Models\Schedule;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class BiodataExportController extends Controller
{
    public $open;

    public $schedule;

    public function __construct()
    {
        $this->open = RegistrationStatus::getRegistrationStatus();
        $this->schedule = Schedule::whereNotNull('active_in')
            ->select('id', 'name', 'location', 'date_start', 'date_end', 'time')
            ->firstOr(callback: fn () => abort(505));
    }

    protected function getRegistrantBiodata($identifier)
    {
        return User::query()->withRegistrantDetails($identifier)->firstOr(callback: fn () => abort(504));
    }

    protected function getRegistrantTimeline()
    {
        return auth()->user()->registrantActivity->download_biodata;
    }

    public function preview($identifier)
    {
        if ($this->open) {
            return view('pdf.registrant.preview-biodata', [
                'user' => new RegistrantSingleResource($this->getRegistrantBiodata($identifier)),
                'schedule' => $this->schedule,
            ]);
        }

        return back()->with('status-failed', 'Sorry cannot download or preview biodata, registration is close now');
    }

    public function manual($identifier)
    {
        if ($this->open) {
            $user = $this->getRegistrantBiodata($identifier);

            if (! $this->getRegistrantTimeline()) {
                RegistrantActivity::updateDownloadBiodata($user->id);
            }

            return view('pdf.registrant.manual-biodata', [
                'user' => new RegistrantSingleResource($user),
                'schedule' => $this->schedule,
            ]);
        }

        return back()->with('status-failed', 'Sorry cannot download or preview biodata, registration is close now');
    }

    public function auto($identifier)
    {
        if ($this->open) {
            $user = $this->getRegistrantBiodata($identifier);

            if (! $this->getRegistrantTimeline()) {
                RegistrantActivity::updateDownloadBiodata($user->id);
            }

            $pdf = Pdf::loadView('pdf.registrant.automatic-biodata', [
                'user' => new RegistrantSingleResource($user),
                'schedule' => $this->schedule,
            ])->setPaper('legal', 'potrait');

            return $pdf->download('biodata-'.$user->username.'-'.mt_rand(9999, 99999).'.pdf');
        }

        return back()->with('status-failed', 'Sorry cannot download or preview biodata, registration is close now');
    }
}
