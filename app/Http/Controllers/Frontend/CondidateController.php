<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Backend\CondidateDetail;
use App\Models\Backend\Country;
use App\Models\Backend\State;
use App\Models\Backend\City;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Rule;
use App\Models\Degree;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;


class CondidateController extends Controller
{
    public function login()
    {
        try {
            $countries =  Country::get();
            $states = State::get();
            $cities = City::get();
            return view('frontend.auth.login', compact('countries', 'states', 'cities'));
        } catch (\Exception $e) {
            abort('500');
        }
    }

    public function loginStore(LoginRequest $request)
    {
        try {
            $request->authenticate();
            $request->session()->regenerate();
            return redirect()->route('frontend.home');
        } catch (\Exception $e) {
            abort('500');
        }
    }


    // public function registerCondidate(Request $request)
    // {

    //     $validated = $request->validate([
    //             'first_name' => ['required', 'string', 'max:255'],
    //             'last_name' => ['required', 'string', 'max:255'],
    //             'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
    //             'phone' => ['required', 'digits:10', 'unique:users,phone'],
    //             'country' => ['required'],
    //             'state' => ['required'],
    //             'city' => ['required'],
    //             'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //             'gender' => ['required'],
    //             'aviation_type' => ['required'],
    //             'experienced' => ['required'],
    //     ]);

    //     try {
    //         $user = User::create([
    //             "name" => $validated['first_name'] . ' ' . $validated['last_name'],
    //             "first_name" =>$validated[ 'first_name'],
    //             "last_name" => $validated['last_name'],
    //             "email" => $validated['email'],
    //             "phone" => $validated['phone'],
    //             "country" => $validated['country'],
    //             "state" => $validated['state'],
    //             "city" => $validated['city'],
    //             "password" => Hash::make($validated['password']),
    //             "gender" => $validated['gender'],
    //             "user_role_id" => 4
    //         ]);

    //         // $user->update([
    //         //     "created_by" => $user->id
    //         // ]);

    //         CondidateDetail::create([
    //             "user_id" => $user->id,
    //             "field" =>$validated['aviation_type'],
    //             "is_experienced" => $validated['experienced'],
    //         ]);

    //         event(new Registered($user));
    //         Auth::login($user);

    //         return redirect()->route('frontend.home');

    //     } catch (\Exception $e) {
    //         Log::error('Register Error: ' . $e->getMessage());
    //         return redirect()->back()->with('error', 'Something went wrong, please try again.');
    //     }
    // }


    public function registerCondidate(Request $request)
    {
        try {
            Log::info('Received registration request', $request->all());

            $user = User::create([
                "name" => $request->first_name . ' ' . $request->last_name,
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "email" => $request->email,
                "phone" => $request->phone,
                "country_id" => $request->country,
                "state_id" => $request->state,
                "city_id" => $request->city,
                "password" => Hash::make($request->password),
                "gender" => $request->gender,
                "user_role_id" => 4
            ]);

            Log::info('User created successfully', ['user_id' => $user->id]);

            $candidateDetail = CondidateDetail::create([
                "user_id" => $user->id,
                "field" => $request->aviation_type,
                "is_experienced" => $request->experienced,
            ]);

            Log::info('Candidate detail created successfully', ['candidate_detail_id' => $candidateDetail->id]);

            event(new Registered($user));
            Auth::login($user);

            return redirect()->route('frontend.home')->with('success', 'Registration successful.');
        } catch (\Exception $e) {
            Log::error('Register Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong, please try again.');
        }
    }

    public function condidateList()
    {
        try {
            $condidates = User::with(['getCondidateDetail', 'getCreatedBy', 'getAmendedBy'])->where('user_role_id', 4)->get();

            $degrees = Degree::all();

            return view('backend.condidates.index', compact('condidates', 'degrees'));
        } catch (\Exception $e) {
            abort('500');
        }
    }

    public function condidateCreate()
    {
        try {
            return view('backend.condidates.create');
        } catch (\Exception $e) {
            abort('500');
        }
    }

    public function condidateStore(Request $request)
    {
        $validate = $request->validate([
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:100', 'unique:' . User::class],
            "father_name" => ['required', 'string', 'max:50'],
            "password" => ['required', 'confirmed', Rules\Password::defaults()],
            "date_of_birth" => ['required'],
            "gender" => ['required'],
            "skills" => ['required'],
            "languages" => ['required'],
            "marital_status" => ['required'],
            "nationality" => ['required', 'string', 'max:20'],
            "national_id_card" => ['required'],
            "country" => ['required'],
            "state" => ['required'],
            "city" => ['required'],
            "phone" => ['required', 'digits:10', 'unique:' . User::class],
            "experience_in_year" => ['required', 'numeric'],
            "career_level" => ['required'],
            "functional_area" => ['required'],
            "current_salary" => ['required', 'numeric'],
            "expected_salary" => ['required', 'numeric'],
            "salary_currency" => ['required'],
            "availablity" => ['required'],
            "available_at" => ['required'],
            "address" => ['required', 'string', 'max:200'],
        ]);
        try {
            $new_user = User::create([
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "name" => $request->first_name . ' ' . $request->last_name,
                "email" => $request->email,
                "phone" => $request->phone,
                "password" => Hash::make($request->password),
                "country_id" => $request->country,
                "state_id" => $request->state,
                "city_id" => $request->city,
                "gender" => $request->gender,
                "user_role_id" => 4,
                "created_by" => Auth::user()->id
            ]);
            CondidateDetail::create([
                "user_id" => $new_user->id,
                "father_name" => $request->father_name,
                "date_of_birth" => $request->date_of_birth,
                "gender" => $request->gender,
                "skills" => $request->skills,
                "language" => $request->languages,
                "marital_status" => $request->marital_status,
                "nationality" => $request->nationality,
                "national_id_card" => $request->national_id_card,
                "experience" => $request->experience_in_year,
                "career_level" => $request->career_level,
                "functional_area" => $request->functional_area,
                "current_salary" => $request->current_salary,
                "expected_salary" => $request->expected_salary,
                "salary_currency" => $request->salary_currency,
                "facebook_url" => $request->facebook_url,
                "linkedin_url" => $request->linkedin_url,
                "availability" => $request->availablity,
                "available_at" => $request->available_at,
                "address" => $request->address
            ]);

            return redirect()->route('backend.condidate_list')->with('created', 'Condidate added successfully!');
        } catch (\Exception $e) {
            abort('500');
        }
    }

    public function condidateEdit($id)
    {
        try {
            $id = Crypt::decrypt($id);
            $condidate = User::with(['getCondidateDetail', 'getCreatedBy', 'getAmendedBy'])->where('id', $id)->first();
            return view('backend.condidates.edit', compact('condidate'));
        } catch (\Exception $e) {
            abort('500');
        }
    }

    public function condidateUpdate(Request $request, $id)
    {
        $validate = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:100',
                Rule::unique('users', 'email')->ignore($id, 'id'),
            ],
            'father_name' => 'required|string|max:50',
            'date_of_birth' => 'required',
            'gender' => 'required|in:Male,Female',
            'skills' => 'required|array',
            'languages' => 'required|array',
            'marital_status' => 'required|in:Single,Married',
            'nationality' => 'required',
            'national_id_card' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'phone' => [
                'required',
                'digits:10',
                Rule::unique('users', 'phone')->ignore($id, 'id'),
            ],
            'experience_in_year' => 'required|numeric',
            'career_level' => 'required',
            'functional_area' => 'required',
            'current_salary' => 'required|numeric',
            'expected_salary' => 'required|numeric',
            'salary_currency' => 'required',
            'address' => 'required|string|max:200',
            'available_at' => 'required',
            'availablity' => 'required|in:Not Immediate Available,Immediate Available',
        ]);

        try {
            $user = User::findOrFail($id);
            $condidate = CondidateDetail::firstOrNew(['user_id' => $user->id]);

            $user->update([
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "name" => $request->first_name . ' ' . $request->last_name,
                "email" => $request->email,
                "phone" => $request->phone,
                "country" => $request->country,
                "state" => $request->state,
                "city" => $request->city,
                "gender" => $request->gender,
            ]);

            $condidate->fill([
                'father_name' => $request->father_name,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'skills' => $request->skills,
                'languages' => $request->languages,
                'marital_status' => $request->marital_status,
                'nationality' => $request->nationality,
                'national_id_card' => $request->national_id_card,
                'experience' => $request->experience_in_year,
                'career_level' => $request->career_level,
                'functional_area' => $request->functional_area,
                'current_salary' => $request->current_salary,
                'expected_salary' => $request->expected_salary,
                'salary_currency' => $request->salary_currency,
                'facebook_url' => $request->facebook_url,
                'linkedin_url' => $request->linkedin_url,
                'available_at' => $request->available_at,
                'availablity' => $request->availablity,
                'address' => $request->address,
            ])->save();

            return redirect()->route('backend.condidate_list')->with('updated', 'Candidate updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the candidate.');
        }
    }

    public function getStates($country_id)
    {
        $states = State::where('country_id', $country_id)->get();
        return response()->json($states);
    }

    public function getCities($state_id)
    {
        $cities = City::where('state_id', $state_id)->get();
        return response()->json($cities);
    }

    public function softDelete(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'Candidate soft deleted successfully.');
    }
}
