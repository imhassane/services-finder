<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function worker() {
        return view('auth.register_worker');
    }

    public function user() {
        return view('auth.register_user');
    }

    public function storeWorker(Request $request) {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'required|min:9|max:9',
            'password' => 'required|min:8|confirmed'
        ]);

        DB::transaction(function() use ($request) {
            $user = User::create([
                'password' => Hash::make($request->password),
                'name' => $request->firstName . " " . $request->lastName,
                'status' => 'WORKER'
            ]);
            Worker::create([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'avatar' => 'default.png',
                'phone_number' => $request->phoneNumber,
                'note' => 0,
                'user_id' => $user->id
            ]);
        });

        // Connexion
        return redirect()->route('login');
    }

    public function storeUser(Request $request) {
        return back()->with('success', "Votre compte a été créé");
    }
}
