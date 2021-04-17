<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request) {
        $position = $request->query('position');
        $quartier = $request->query('quartier');
        $service = $request->query('service');
        $prefecture = $request->query('prefecture');
        $minDistance = $request->query('distance');

        $workers = [];

        if(is_null($minDistance))
            $minDistance = 5;

        if(!is_null($position)) {
            $pos = explode("_", $position);
            $latitude = $pos[0];
            $longitude = $pos[1];

            $query =
                "worker_id, w.avatar, w.first_name, w.last_name, w.note, w.phone_number" .
                ", (((acos(sin((? * pi()/180)) * sin((latitude*pi()/180)) + cos((? * pi()/180)) * cos((latitude*pi()/180)) * cos(((? - longitude) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344) as distance";

            $workers =
                DB::table('coords')
                    ->selectRaw($query, [$latitude, $latitude, $longitude])
                    ->join('workers as w', 'worker_id', '=', 'w.id')
                    ->join('user_skills as us', 'w.user_id', '=', 'us.user_id')
                    ->whereRaw('us.skill_id = ?', [$service]);

            if(is_null($quartier))
                $workers = $workers->whereRaw(
                    "(((acos(sin((? * pi()/180)) * sin((latitude*pi()/180)) + cos((? * pi()/180)) *".
                    "cos((latitude*pi()/180)) * cos(((? - longitude) * pi()/180)))) * 180/pi()) * 60 * 1.1515 *" .
                    "1.609344) < ?", [$latitude, $latitude, $longitude, $minDistance]);
            else
                $workers = $workers
                                ->whereRaw('quartier = ?', [strtolower($quartier)])
                                ->whereRaw('prefecture = ?', [strtolower($prefecture)]);

            $workers = $workers->paginate(20);
        }

        return view('search.search', [
            'workers' => $workers,
            'skills' => Skill::where('visible', 1)->get()
        ]);
    }

    public function nearbyWorkersJson() {
        return ;
    }

    protected function getDistance(
        $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
    {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;
    }
}
