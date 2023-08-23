<?php

namespace App\Http\Controllers;

use App\Http\Resources\RegistrantSingleResource;
use App\Models\RegistrantActivity;
use App\Models\RegistrationStatus;
use App\Models\User;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public $open;

    public function __construct()
    {
        $data = RegistrationStatus::query()->where('id', 1)->select('status')->first()->status;
        $this->open = $data == 1 ? true : false;
    }

    public function index(User $user)
    {
        if ($this->open) {
            $user = User::query()
                ->where('username', $user->username)
                ->whereDoesntHave('roles')
                ->select('id', 'name', 'username', 'email', 'picture')
                ->whereNotNull(['id', 'name', 'username', 'email', 'picture'])
                ->with(['biodata' => fn ($query) => $query->whereNotNull([
                    'fullname', 'whatsapp', 'sex', 'religion', 'city', 'birthday', 'address', 'university', 'faculty',
                    'major', 'semester', 'father', 'fatherWhatsapp', 'mother', 'motherWhatsapp', 'vehicle', 'organizationsExp', 'goals',
                ])->firstOr(callback: fn () => abort(504))])
                ->firstOr(callback: fn () => abort(504));

            return view('biodata.report', ['user' => new RegistrantSingleResource($user)]);
        }

        return back()->with('status-failed', 'Sorry cannot download or preview biodata, registration is close now');
    }

    public function print(Request $request, User $user)
    {
        if ($this->open) {
            $user = User::query()
                ->where('username', $user->username)
                ->whereDoesntHave('roles')
                ->select('id', 'name', 'username', 'email', 'picture')
                ->whereNotNull(['id', 'name', 'username', 'email', 'picture'])
                ->with(['biodata' => fn ($query) => $query->whereNotNull([
                    'fullname', 'whatsapp', 'sex', 'religion', 'city', 'birthday', 'address', 'university', 'faculty',
                    'major', 'semester', 'father', 'fatherWhatsapp', 'mother', 'motherWhatsapp', 'vehicle', 'organizationsExp', 'goals',
                ])->firstOr(callback: fn () => abort(504))])
                ->firstOr(callback: fn () => abort(504));
            $timeline = auth()->user()->registrantActivity;
            if (! $timeline->download_biodata) {
                RegistrantActivity::where('user_id', $user->id)->update([
                    'download_biodata' => 1,
                    'download_biodata_time' => now(),
                ]);
            }

            return view('biodata.report-print', compact('user'));
        }

        return back()->with('status-failed', 'Sorry cannot download or preview biodata, registration is close now');
    }
}
