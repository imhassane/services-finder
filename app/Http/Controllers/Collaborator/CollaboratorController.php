<?php

namespace App\Http\Controllers\Collaborator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CollaboratorController extends Controller
{
    public function index() {
        $users = User::where('status', 'COLLABORATOR')->get();

        return view('collaborators.index', [
            'collaborators' => $users,
        ]);
    }

    public function add() {
        return view('collaborators.add');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->email),
            'status' => 'COLLABORATOR'
        ]);

        return back()->with('success', "Le collaborateur a été ajouté");
    }
}
