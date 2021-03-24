<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index() {
        $workers = Worker::paginate(20);

        return view('dashboard.admin.workers', [
            'workers' => $workers
        ]);
    }

    public function blockUser(Request $request, User $user) {
        if($user->visible == 0)
            return response(null, 409);

        $user->visible = 0;
        $user->save();

        return back()->with('success', "L'utilisateur a été bloqué");
    }

    public function activateUser(Request $request, User $user) {
        if($user->visible == 1)
            return response(null, 409);

        $user->visible = 1;
        $user->save();

        return back()->with('success', "Le compte a été activé");
    }
}
