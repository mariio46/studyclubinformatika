<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\View\View;

class RegistrantsTableExportController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:operator|admin']);
    }

    public function preview(): View
    {
        return view('pdf.operator.table.pdf-format.preview', [
            'registrants' => User::getVerifiiedRegistrants(),
        ]);
    }

    public function tableManual(): View
    {
        return view('pdf.operator.table.pdf-format.manual', [
            'registrants' => User::getVerifiiedRegistrants(),
        ]);
    }

    public function tableAuto()
    {
        $registrants = User::getVerifiiedRegistrants();

        $pdf = Pdf::loadView('pdf.operator.table.pdf-format.automatic', compact('registrants'))->setPaper('legal', 'landscape');

        return $pdf->download('Daftar-Pendaftar-'.now()->format('Y').'-'.mt_rand(9999, 99999).'.pdf');
    }
}
