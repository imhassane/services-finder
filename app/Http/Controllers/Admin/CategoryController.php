<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $cats = Skill::paginate(20);
        return view('dashboard.admin.categories', [
            'categories' => $cats,
        ]);
    }

    public function add() {
        return view('dashboard.admin.add_category');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|min:3',
            'description' => 'required|min:30',
            'cover' => 'required'
        ]);

        Skill::create([
            'title' => $request->title,
            'description' => $request->description,
            'cover' => $request->cover
        ]);

        return back()->with('success', "La catégorie a été ajoutée");
    }
}
