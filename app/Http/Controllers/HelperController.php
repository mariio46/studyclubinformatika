<?php

namespace App\Http\Controllers;

use App\Http\Resources\RegistrantHelperResource;
use App\Models\User;
use Illuminate\View\View;

class HelperController extends Controller
{
    public function __invoke(): View
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
