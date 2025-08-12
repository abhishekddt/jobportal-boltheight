<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\City;
use App\Models\Backend\Country;
use App\Models\Backend\State;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(){
        try{

            $countries = Country::paginate(20);
            $states = State::with('getCountry')->paginate(20);
            $cities = City::paginate(20);
            return view('backend.countries.index', compact('countries', 'states', 'cities'));
        }catch(\Exception $e){
            abort('500');
        }
    }
}
