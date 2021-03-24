<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index() {
        $skills = Skill::where('visible', 1)->get();

        return view('welcome', [
            'skills' => $skills
        ]);
    }
}
