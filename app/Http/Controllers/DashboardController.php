<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();

        return view(
            'dashboard', [
                'user' => $user,
                'links' => $user->links()
                ->orderBy('sort')
                ->get(),
            ]
        );
    }
}
