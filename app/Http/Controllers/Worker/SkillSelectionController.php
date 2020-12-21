<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use http\Client\Response;
use Illuminate\Http\Request;

class SkillSelectionController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index() {
        $skills = Skill::get();

        return view('worker.choose_skill', [
            'skills' => $skills
        ]);
    }

    public function storeSKill(Request $request, SKill $skill) {

        if($skill->hasUser($request->user())) {
            return response(null, 409);
        }

        $skill->users()->create([
            'user_id' => $request->user()->id
        ]);

        return back();
    }

    public function destroySkill(Request $request, Skill $skill) {
        $request->user()
            ->skills
            ->where('skill_id', $skill->id)
            ->map(function($sk) {
                $sk->delete();
            });
        return back();
    }
}
