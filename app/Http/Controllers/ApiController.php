<?php

namespace App\Http\Controllers;

use App\Models\Backend\City;
use App\Models\Backend\Country;
use App\Models\Backend\State;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Backend\FuncationalArea;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    public function getCountries()
    {
        try {
            $countries = Country::get();
            return response()->json([
                "status" => "success",
                "countries" => $countries
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function getStates(Request $request)
    {

        try {
            $validate = $request->validate([
                "country_id" => ['required']
            ]);
            $states = State::where('country_id', $request->country_id)->get();
            return response()->json([
                "status" => "success",
                "cities" => $states
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function getCities(Request $request)
    {
        try {
            $validate = $request->validate([
                "state_id" => ['required']
            ]);
            $cities = City::where('state_id', $request->state_id)->get();
            return response()->json([
                "status" => "success",
                "cities" => $cities
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function checkExistingUserEmail(Request $request)
    {
        try {
            $validate = $request->validate([
                "email" => ['required'],
            ]);
            $user = User::where('email', $request->email)->exists();
            return response()->json([
                "status" => "success",
                "user" => $user
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function checkExistingUserPhone(Request $request)
    {
        try {
            $validate = $request->validate([
                "phone" => ['required'],
            ]);
            $user = User::where('phone', $request->phone)->exists();
            return response()->json([
                "status" => "success",
                "user" => $user
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function getStatesByCountry($countryId)
    {
        $states = State::where('country_id', $countryId)->get();
        return response()->json($states);
    }

    public function getCurrency($country_id)
    {
        $country = Country::find($country_id);

        if ($country) {
            return response()->json(['currency' => $country->currency]);
        }

        return response()->json(['currency' => null], 404);
    }

    public function getCitiesByState($stateId)
    {
        $cities = City::where('state_id', $stateId)->get();
        return response()->json($cities);
    }

    public function getfuncationalareaByIndustry($industryId)
    {
        $areas = FuncationalArea::where('industry_id', $industryId)->get(['id', 'name']);

        if ($areas->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No functional areas found for the selected industry.',
                'data' => []
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $areas
        ]);
    }

}