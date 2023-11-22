<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Http\Resources\RegistrantSingleResource;
use App\Models\Schedule;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\View\View;

class RegistrantBiodataExportController extends Controller
{
    public $schedule;

    public function __construct()
    {
        $this->middleware(['role:operator|admin']);
        $this->schedule = Schedule::whereNotNull('active_in')
            ->select('id', 'name', 'location', 'date_start', 'date_end', 'time')
            ->firstOr(callback: fn () => abort(505));
    }

    public function preview($identifier): View
    {
        return view('pdf.operator.registrant-biodata.preview-biodata', [
            'user' => new RegistrantSingleResource($this->getRegistrantBiodata($identifier)),
            'schedule' => $this->schedule,
        ]);
    }

    public function manual($identifier): View
    {
        $user = $this->getRegistrantBiodata($identifier);

        return view('pdf.operator.registrant-biodata.manual-biodata', [
            'user' => new RegistrantSingleResource($user),
            'schedule' => $this->schedule,
        ]);
    }

    public function auto($identifier)
    {
        $user = $this->getRegistrantBiodata($identifier);
        $pdf = Pdf::loadView('pdf.operator.registrant-biodata.automatic-biodata', [
            'user' => new RegistrantSingleResource($user),
            'schedule' => $this->schedule,
        ])->setPaper('legal', 'potrait');

        return $pdf->download('biodata-' . $user->username . '-' . mt_rand(9999, 99999) . '.pdf');
    }

    protected function getRegistrantBiodata($identifier)
    {
        return User::query()->withRegistrantDetails($identifier)->firstOr(callback: fn () => abort(504));
    }
}
