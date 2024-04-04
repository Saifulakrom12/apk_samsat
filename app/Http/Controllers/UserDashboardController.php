<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    //
    public function user_dashboard() {
        return view('layout.config.user.barang.userDashboard');
    }
}
