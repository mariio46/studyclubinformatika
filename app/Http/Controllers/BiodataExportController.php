<?php

namespace App\Http\Controllers;

use App\Http\Resources\RegistrantSingleResource;
use App\Models\Registration;
use App\Models\Schedule;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class BiodataExportController extends Controller
{
    public $open;

    public $schedule;

    public function __construct()
    {
        $this->open = Registration::getRegistrationStatus();
        $this->schedule = Schedule::whereNotNull('active_in')
            ->select('id', 'name', 'location', 'date_start', 'date_end', 'time')
            ->firstOr(callback: fn () => abort(505));
    }

    public function preview($identifier)
    {
        if ($this->open && auth()->user()->username == $identifier) {
            return view('pdf.registrant.preview-biodata', [
                'user' => new RegistrantSingleResource($this->getRegistrantBiodata($identifier)),
                'schedule' => $this->schedule,
            ]);
        }

        return to_route('biodata.index')->with('status-failed', 'Maaf, saat ini tidak bisa mengunduh atau melihat biodata');
    }

    public function manual($identifier)
    {
        if ($this->open && auth()->user()->username == $identifier) {
            $user = $this->getRegistrantBiodata($identifier);

            if (! $this->getRegistrantTimeline()) {
                $user->timeline()->update([
                    'download_biodata' => 1,
                    'download_biodata_time' => now(),
                ]);
            }

            return view('pdf.registrant.manual-biodata', [
                'user' => new RegistrantSingleResource($user),
                'schedule' => $this->schedule,
            ]);
        }

        return to_route('biodata.index')->with('status-failed', 'Maaf, saat ini tidak bisa mengunduh atau melihat biodata');
    }

    public function auto($identifier)
    {
        if ($this->open && auth()->user()->username == $identifier) {
            $user = $this->getRegistrantBiodata($identifier);

            if (! $this->getRegistrantTimeline()) {
                $user->timeline()->update([
                    'download_biodata' => 1,
                    'download_biodata_time' => now(),
                ]);
            }

            $pdf = Pdf::loadView('pdf.registrant.automatic-biodata', [
                'user' => new RegistrantSingleResource($user),
                'schedule' => $this->schedule,
            ])->setPaper('legal', 'potrait');

            return $pdf->download('biodata-' . $user->username . '-' . mt_rand(9999, 99999) . '.pdf');
        }

        return to_route('biodata.index')->with('status-failed', 'Maaf, saat ini tidak bisa mengunduh atau melihat biodata');
    }

    protected function getRegistrantBiodata($identifier)
    {
        return User::query()->withRegistrantDetails($identifier)->firstOr(callback: fn () => abort(504));
    }

    protected function getRegistrantTimeline()
    {
        return auth()->user()->timeline->download_biodata;
    }
}
