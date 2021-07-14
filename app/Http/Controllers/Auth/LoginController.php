<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct() {
        $this->middleware(['guest']);
    }

    public function index() {
        return view('auth.login');
    }

    public function loginAdmin() {
        return view('auth.login_admin');
    }

    public function reactivationDemand() {
        return view('auth.reactivation_demand');
    }

    public function authenticate(Request $request) {
        $this->validate($request, [
            'telephone' => 'required|min:9|max:9',
            'password' => 'required|min:8'
        ]);

        // Connexion avec le numéro de téléphone et le mot de passe
        $user =
            DB::table('workers')
                ->select($columns = ['phone_number', 'password', 'user_id', 'visible'])
                ->join('users as w', 'user_id', '=', 'w.id')
                ->whereRaw('phone_number = ?', [$request->telephone])
                ->limit(1)
                ->get();

        if(count($user) == 1)
            $user = $user[0];
        else
            return back()->with('fail', "Les identifiants ne sont pas reconnus");

        if(!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('fail', "Les identifiants ne sont pas reconnus");
        }

        Auth::loginUsingId($user->user_id);

        if($user->visible == 0) {
            auth()->logout();
            return back()->with('fail', "Ce compte a été désactivé, essayez une demande de réactivation");
        }

        return redirect()->route("worker_settings");
    }

    public function authenticateAdmin(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if(!Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], true)) {
           return back()->with('fail', "Le compte n'est pas reconnu");
        }

        return redirect()->route('categories_admin');
    }

    public function reactivate(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        return back();
    }

}
