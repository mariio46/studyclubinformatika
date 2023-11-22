<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOperatorRequest;
use App\Http\Resources\OperatorResource;
use App\Http\Resources\OperatorSingleResource;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class OperatorListController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index(Request $request): View
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
            'collections' => OperatorResource::collection($operators),
        ]);
    }

    public function show(User $user): View
    {
        return view('admin.operator.show', [
            'operator' => new OperatorSingleResource($user
                ->where('username', $user->username)
                ->whereHas('roles', fn ($query) => $query->where('name', 'operator'))
                ->firstOrFail()),
        ]);
    }

    public function store(CreateOperatorRequest $request): RedirectResponse
    {
        $user = User::create([
            'has_verified' => 1,
            'name' => $request->name,
            'username' => strtolower(Str::of($request->name)->explode(' ')->get(0)) . strtolower(mt_rand(11111, 99999)),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('operator');

        return back()->with('status', 'Operator has been added!');
    }

    public function operatorForgetPassword(Request $request): RedirectResponse
    {
        $request->validateWithBag('operatorForgetPasswordDelition', [
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        User::where('id', $request->userId)->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('status-success', 'Operator password has been updated');
    }
}
