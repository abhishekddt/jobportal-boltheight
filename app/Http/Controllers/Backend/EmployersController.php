<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Industry;
use App\Models\Backend\State;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Backend\Country;
use App\Models\Backend\City;
use App\Models\Backend\EmployerDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use App\Models\Backend\FuncationalArea;

class EmployersController extends Controller
{
    public function index()
    {
        try {
            $employers = EmployerDetail::with(['user', 'createdBy', 'industry', 'funcationalArea'])->orderBy('updated_at', 'desc')->paginate(20);

            return view('backend.employers.index', compact('employers'));
        } catch (\Exception $e) {
            Log::error($e);
            abort('500');
        }
    }

    public function create()
    {
        try {
            $countries = Country::all();
            $industries = Industry::all();
            return view('backend.employers.create', compact('countries', 'industries'));
        } catch (\Exception $e) {
            abort('500');
        }
    }

    public function storeEmployer(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'emp_name' => 'required|string|max:50',
                'emp_email' => 'required|email|unique:users,email',
                'emp_phone' => 'required|digits_between:7,15|unique:users,phone',
                'emp_ceo' => 'required|string|max:50',
                'emp_company' => 'required|string|max:50',
                'password' => 'required|confirmed|min:6',
                'industry' => 'required|exists:industries,id',
                'functional_area' => 'required|exists:funcational_areas,id',
                'ownership_type' => 'required|string|max:50',
                'country' => 'required|exists:countries,id',
                'state' => 'required|exists:states,id',
                'city' => 'required|exists:cities,id',
                'company_size' => 'required|string',
                'established_year' => 'required|digits:4',
                'location' => 'required|string|max:255',
                'second_office_location' => 'nullable|string|max:255',
                'employer_detail' => 'required|string',
                'website' => 'nullable|url|max:255',
                'facbook' => 'nullable|url|max:255',
                'linkedin' => 'required|url|max:255',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $validated = $validator->validated();

            $user = User::create([
                'name' => $validated['emp_name'],
                'email' => $validated['emp_email'],
                'phone' => $validated['emp_phone'],
                'password' => Hash::make($validated['password']),
                'user_role_id' => 3,
                'status' => 1,
                'country_id' => $validated['country'],
                'state_id' => $validated['state'],
                'city_id' => $validated['city'],
                'created_by' => auth()->id(),
            ]);

            EmployerDetail::create([
                'user_id' => $user->id,
                'ceo_name' => $validated['emp_ceo'],
                'company_name' => $validated['emp_company'],
                'industry_id' => $validated['industry'],
                'functional_area_id' => $validated['functional_area'],
                'ownership_type' => $validated['ownership_type'],
                'company_size' => $validated['company_size'],
                'established_year' => $validated['established_year'],
                'location' => $validated['location'],
                'second_office_location' => $validated['second_office_location'],
                'employer_detail' => $validated['employer_detail'],
                'website' => $validated['website'],
                'facebook_url' => $validated['facbook'],
                'linkedin_url' => $validated['linkedin'],
                'status' => 1,
            ]);

            return redirect()->route('backend.employers.index')->with('success', 'Employer created successfully.');

        } catch (\Exception $e) {
            Log::error('Error in storeEmployer:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'user_id' => auth()->id(),
                'input' => $request->except(['password', 'password_confirmation']), // avoid logging sensitive data
            ]);

            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function toggleEmployerStatus(Request $request, $encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);

            $employer = EmployerDetail::with('user')->findOrFail($id);

            if (!$employer) {
                return response()->json([
                    'success' => false,
                    'message' => "User ID {$id} not found"
                ], 404);
            }

            if ($employer->user->user_role_id != 3) {
                return response()->json([
                    'success' => false,
                    'message' => "User found but is not an employer (role ID = {$employer->user_role_id})."
                ], 400);
            }

            $employer->user->status = !$employer->user->status;
            $employer->user->save();

            return response()->json([
                'success' => true,
                'status' => $employer->status
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'success' => false,
                'message' => 'Failed to update employer status: ' . $e->getMessage()
            ], 500);
        }
    }

    public function edit($encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            $countries = Country::all();
            $employer = EmployerDetail::with(['user', 'createdBy', 'industry', 'funcationalArea'])->find($id);
            $industries = Industry::all();
            $states = State::where('country_id', $employer->user->country_id)->get();

            $cities = City::where('state_id', $employer->user->state_id)->get();

            $areas = FuncationalArea::with('industry')->get();

            return view('backend.employers.edit', compact('countries', 'industries', 'employer', 'areas', 'states', 'cities'));
        } catch (\Exception $e) {
            Log::error($e);
            abort('500');
        }
    }

    public function update(Request $request, $encryptedId)
    {
        try {
             $id = Crypt::decrypt($encryptedId);
            $employer = EmployerDetail::with('user')->findOrFail($id);
            $userId = $employer->user->id;

            $validator = Validator::make($request->all(), [
                'emp_name' => 'required|string|max:50',
                'emp_email' => 'required|email|unique:users,email,' . $userId,
                'emp_phone' => 'required|digits_between:7,15|unique:users,phone,' . $userId,
                'emp_ceo' => 'required|string|max:50',
                'emp_company' => 'required|string|max:50',
                'industry' => 'required|exists:industries,id',
                'functional_area' => 'required|exists:funcational_areas,id',
                'ownership_type' => 'required|string|max:50',
                'country' => 'required|exists:countries,id',
                'state' => 'required|exists:states,id',
                'city' => 'required|exists:cities,id',
                'company_size' => 'required|string',
                'established_year' => 'required|digits:4',
                'location' => 'required|string|max:255',
                'second_office_location' => 'nullable|string|max:255',
                'employer_detail' => 'required|string',
                'website' => 'nullable|url|max:255',
                'facbook' => 'nullable|url|max:255',
                'linkedin' => 'required|url|max:255',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $validated = $validator->validated();

            $employer->user->update([
                'name' => $validated['emp_name'],
                'email' => $validated['emp_email'],
                'phone' => $validated['emp_phone'],
                'status' => 1,
                'country_id' => $validated['country'],
                'state_id' => $validated['state'],
                'city_id' => $validated['city'],
                'created_by' => auth()->id(),
            ]);

            $employer->update([
                'ceo_name' => $validated['emp_ceo'],
                'company_name' => $validated['emp_company'],
                'industry_id' => $validated['industry'],
                'functional_area_id' => $validated['functional_area'],
                'ownership_type' => $validated['ownership_type'],
                'company_size' => $validated['company_size'],
                'established_year' => $validated['established_year'],
                'location' => $validated['location'],
                'second_office_location' => $validated['second_office_location'],
                'employer_detail' => $validated['employer_detail'],
                'website' => $validated['website'],
                'facebook_url' => $validated['facbook'],
                'linkedin_url' => $validated['linkedin'],
            ]);

            return redirect()->route('backend.employers.index')->with('success', 'Employer updated successfully.');
        } catch (\Exception $e) {
            Log::error($e);
            abort('500');
        }
    }

}