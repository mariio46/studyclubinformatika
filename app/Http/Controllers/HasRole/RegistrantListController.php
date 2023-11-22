<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Http\Resources\RegistrantResource;
use App\Http\Resources\RegistrantSingleResource;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class RegistrantListController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:operator|admin']);
    }

    public function index(Request $request): View
    {
        if ($request->keyword) {
            $registrants = User::search($request->keyword)
                ->query(
                    fn ($query) => $query->select('id', 'name', 'username', 'picture', 'email', 'created_at', 'has_verified')
                        ->doesntHave('roles')
                        ->with(['timeline' => fn ($timeline) => $timeline->select('user_id', 'update_biodata')])
                )
                ->withTrashed()
                ->get();
        } else {
            $registrants = User::query()
                ->select('id', 'name', 'username', 'picture', 'email', 'created_at', 'has_verified')
                ->doesntHave('roles')
                ->with(['timeline' => fn ($timeline) => $timeline->select('user_id', 'update_biodata')])
                ->get();
        }

        return view('operator.registrant.index', [
            'open' => Registration::getRegistrationStatus(),
            'collections' => RegistrantResource::collection($registrants),
            'total' => User::doesntHave('roles')->count(),
        ]);
    }

    public function show(User $user): View
    {
        return view('operator.registrant.show', [
            'registrant' => new RegistrantSingleResource($user->load([
                'biodata' => fn ($biodata) => $biodata->firstOrFail(),
                'timeline' => fn ($timeline) => $timeline->firstOrFail(),
            ])),
        ]);
    }

    public function delete(User $user): RedirectResponse
    {
        $user->hasPicture() ? Storage::delete($user->picture) : true;

        $user->delete();

        return back()->with('status-success', "{$user->getNickname()} berhasil di hapus!");
    }

    public function deleteUnverified(): RedirectResponse
    {
        User::where('has_verified', 0)->delete('id');

        return back()->with('status-success', 'Pendaftar yang tidak diverifikasi berhasil dihapus!');
    }

    public function deleteAll(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        User::whereDoesntHave('roles')->delete('id');

        return back()->with('status-success', 'Semua pendaftar berhasil dihapus!');
    }
}
