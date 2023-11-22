<?php

namespace App\Http\Controllers;

use App\Http\Resources\RegistrantHelperResource;
use App\Models\User;

class HelperController extends Controller
{
    public function __invoke()
    {
        $operators = User::query()
            ->select('id', 'name', 'picture', 'whatsapp')
            ->whereHas('roles', fn ($query) => $query->where('name', 'operator'))
            ->whereNotNull(['name', 'whatsapp'])
            ->get();

        return view('help.index', [
            'operators' => RegistrantHelperResource::collection($operators),
        ]);
    }
}
