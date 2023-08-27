<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\RegistrantSingleResource;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class RegistrantBiodataExportController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:operator|admin']);
    }

    public function preview($identifier)
    {
        $user = User::query()
            ->withRegistrantDetails($identifier)
            ->firstOr(callback: fn () => abort(504));

        return view('pdf.operator.registrant-biodata.preview-biodata', ['user' => new RegistrantSingleResource($user)]);
    }

    public function manual($identifier)
    {
        $user = User::query()
            ->withRegistrantDetails($identifier)
            ->firstOr(callback: fn () => abort(504));

        return view('pdf.operator.registrant-biodata.manual-biodata', compact('user'));
    }

    public function auto($identifier)
    {
        $user = User::query()
            ->withRegistrantDetails($identifier)
            ->firstOr(callback: fn () => abort(504));
        $sra3 = [0, 0, 907.09, 1375.59];
        $pdf = Pdf::loadView('pdf.operator.registrant-biodata.automatic-biodata', ['user' => $user])->setPaper($sra3, 'potrait');

        return $pdf->download('biodata-'.$user->username.'-'.mt_rand(9999, 99999).'.pdf');
    }
}
