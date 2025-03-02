<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OverviewController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalClients = User::role('client')->count();
        $totalAdmins = User::role('administrator')->count();
        $totalStaffs = User::role('staff')->count();

        return view('dashboard.admin.index', [
            'totalStaffs' => $totalStaffs,
            'totalClients' => $totalClients,
            'totalAdmins' => $totalAdmins
        ]);
    }
}
