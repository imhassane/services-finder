<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Coords;
use Illuminate\Http\Request;

class WorkerDashboardController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index() {
        return view('worker.index');
    }

    public function settings() {
        $coords = auth()->user()->worker->coords;

        return view('worker.settings', [
            'coords' => $coords
        ]);
    }

    public function storeAddress(Request $request) {
        $this->validate($request, [
           'latitude' => 'required',
            'longitude' => 'required',
            'quartier' => 'required|min:3',
            'prefecture' => 'required'
        ]);

        Coords::create([
           'latitude' => $request->latitude,
           'longitude' => $request->longitude,
           'quartier' => $request->quartier,
           'prefecture' => $request->prefecture,
            'worker_id' => $request->user()->worker->id
        ]);

        return back();
    }
}
