<?php

namespace App\Http\Controllers;

use App\Http\Resources\RegistrantResource;
use App\Http\Resources\RegistrantSingleResource;
use App\Models\Biodata;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegistrantListController extends Controller
{
    public function index(Request $request)
    {
        if ($request->keyword) {
            $registrants = User::search($request->keyword)
                ->query(fn ($query) => $query->select('id', 'name', 'username', 'email', 'created_at', 'has_verified')
                    ->doesntHave('roles')
                    ->withCount('biodata'))
                ->withTrashed()
                ->get();
        } else {
            $registrants = User::query()
                ->select('id', 'name', 'username', 'email', 'created_at', 'has_verified')
                ->doesntHave('roles')
                ->withCount('biodata')
                ->get();
        }

        return view('operator.registrant.index', [
            'registrants' => RegistrantResource::collection($registrants),
        ]);
    }

    public function show(User $user)
    {
        return view('operator.registrant.show', [
            'registrant' => new RegistrantSingleResource($user
                ->where('username', $user->username)
                ->whereDoesntHave('roles')
                ->with('biodata')
                ->firstOrFail()),
        ]);
    }

    public function store(Request $request)
    {
        Biodata::create([
            'user_id' => $request->userId,
        ]);

        return back()->with('status-success', 'Biodata has been created');
    }

    public function delete(User $user)
    {
        if ($user->picture) {
            Storage::delete($user->picture);
        }
        User::destroy($user->id);

        return back()->with('status-success', $user->getNickname().' has been deleted!');
    }

    public function deleteUnverified()
    {
        User::where('has_verified', 0)->delete('id');

        return back()->with('status-success', 'Unverified registrant has been deleted!');
    }

    public function deleteAll(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
        User::whereDoesntHave('roles')->delete('id');

        return back()->with('status-success', 'All registrant has been deleted!');
    }
}