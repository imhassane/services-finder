<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{
    public function index() {
        $skills = Skill::where('visible', 1)->get();

        // Images
        $bag = asset("storage/images/bags.jpg");
        $beach = asset("storage/images/beach.jpg");
        $carpenter = asset("storage/images/carpenter.jpg");
        $farmer = asset("storage/images/farmer.jpg");
        $old_guy = asset("storage/images/old_guy.jpg");
        $young_woman = asset("storage/images/young_woman.jpg");

        return view('welcome', [
            'skills' => $skills,
            "bag" => $bag,
            "beach" => $beach,
            "carpenter" => $carpenter,
            "farmer" => $farmer,
            "old_guy" => $old_guy,
            "young_woman" => $young_woman,
        ]);
    }
}
