<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $active = 'Dashboard';
        return view('pages.dashboard', [
            'active' => $active
        ]);
    }
}
