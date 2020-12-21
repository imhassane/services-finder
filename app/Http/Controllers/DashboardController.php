<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

    }

    public function admin() {
        return view('dashboard_admin');
    }
}
