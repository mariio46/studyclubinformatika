<?php

namespace App\Http\Controllers;

use App\Http\Resources\OperatorResource;
use App\Http\Resources\OperatorSingleResource;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class OperatorListController extends Controller
{
    public function index(Request $request)
    {
        if ($request->keyword) {
            $operators = User::search($request->keyword)
                ->query(fn ($query) => $query->select('id', 'name', 'username', 'email', 'picture')
                    ->whereHas('roles', fn ($query) => $query->where('name', 'operator')))
                ->withTrashed()
                ->get();
        } else {
            $operators = User::query()
                ->select('id', 'name', 'username', 'email', 'picture')
                ->whereHas('roles', fn ($query) => $query->where('name', 'operator'))
                ->get();
        }

        return view('admin.operator.index', [
            'operators' => OperatorResource::collection($operators),
        ]);
    }

    public function show(User $user)
    {
        return view('admin.operator.show', [
            'registrant' => new OperatorSingleResource($user
                ->where('username', $user->username)
                ->whereHas('roles', fn ($query) => $query->where('name', 'operator'))
                ->firstOrFail()),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validateWithBag('operatorDelition', [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'has_verified' => 1,
            'name' => $name = $request->name,
            'username' => strtolower(Str::of($name)->explode(' ')->get(0)).strtolower(mt_rand(0, 99999)),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('operator');

        return back()->with('status', 'Operator has been added!');
    }

    public function operatorForgetPassword(Request $request)
    {
        // return $request;
        $request->validateWithBag('operatorForgetPasswordDelition', [
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        User::where('id', $request->userId)->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('status-success', 'Operator password has been updated');
    }
}
