<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct() {
        $this->middleware(['guest']);
    }

    public function index() {
        return view('auth.login');
    }

    public function authenticate(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if(!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('fail', "Les identifiants ne sont pas reconnus");
        }

        $route = "";
        switch(auth()->user()->status) {
            case "WORKER":
                $route = "worker_dashboard";
                break;
            case "CUSTOMER":
                $route = "customer_dashboard";
                break;
            case "ADMIN":
                $route = "dashboard";
                break;
            default:
                return back()->with('fail', "Une erreur inconnue est survenue");
        }

        return redirect()->route($route);
    }
}
