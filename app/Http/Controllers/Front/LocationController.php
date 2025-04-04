<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\City;

class LocationController extends Controller
{

    public function getStates($countryId)
    {
        $states = State::where('country_id', $countryId)->orderBy('name', 'asc')->get();
        return response()->json(['states' => $states]);
    }

    public function getCities($stateId)
    {
        $cities = City::where('state_id', $stateId)->get();
        return response()->json(['cities' => $cities]);
    }
}
