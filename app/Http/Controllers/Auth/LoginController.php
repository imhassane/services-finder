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

    public function reactivationDemand() {
        return view('auth.reactivation_demand');
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
        $user = auth()->user();

        switch($user->status) {
            case "WORKER":
                $route = "worker_settings";
                break;
            case "CUSTOMER":
                $route = "customer_dashboard";
                break;
            case "ADMIN":
                $route = "categories_admin";
                break;
            default:
                return back()->with('fail', "Une erreur inconnue est survenue");
        }

        if($user->visible == 0) {
            auth()->logout();
            return back()->with('fail', "Ce compte a été désactivé, essayez une demande de réactivation");
        }

        return redirect()->route($route);
    }

    public function reactivate(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        return back();
    }

}
