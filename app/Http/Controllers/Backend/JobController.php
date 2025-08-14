<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Country;
use App\Models\Backend\EmployerDetail;
use Illuminate\Http\Request;
use App\Models\Backend\FuncationalArea;
use App\Models\Backend\Language;
use Illuminate\Support\Facades\Log;
use App\Models\Backend\Job;
use Illuminate\Support\Facades\Validator;
use App\Models\Backend\City;
use Illuminate\Support\Facades\Crypt;
use App\Models\Backend\Jobtitle;
use App\Models\Backend\Skill;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function index()
    {
        try {

            $jobs = Job::with('company', 'country', 'getCreatedBy', 'state')->paginate(10);

            return view('backend.jobs.index', compact('jobs'));
        } catch (\Exception $e) {
            Log::error($e);
            abort('500');
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $jobId = decrypt($request->id);
            $job = Job::findOrFail($jobId);
            $job->status = $request->status;
            $job->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Invalid ID or server error']);
        }
    }

    public function create()
    {
        try {
            $countries = Country::all();
            $companies = EmployerDetail::with('user', 'funcationalArea')->get();
            $languages = Language::all();

            $aviationAreas = FuncationalArea::whereHas('industry', function ($q) {
                $q->where('name', 'Aviation');
            })->get();

            $nonAviationAreas = FuncationalArea::whereHas('industry', function ($q) {
                $q->where('name', '!=', 'Aviation');
            })->get();

            return view('backend.jobs.create', compact('countries', 'companies', 'aviationAreas', 'nonAviationAreas', 'languages'));
        } catch (\Exception $e) {
            abort('500');
        }
    }

    public function store(Request $request)
    {
        try {
            if ($request->filled('job_skills') && is_string($request->job_skills)) {
                $request->merge([
                    'job_skills' => array_map('trim', explode(',', $request->job_skills))
                ]);
            }

            $validator = Validator::make($request->all(), [
                'company_name' => 'required|exists:employer_details,id',
                'job_title' => 'required|string|max:255',
                'job_type' => 'required|in:Aviation,Non-Aviation',
                'job_category' => 'required|string|max:255',
                'job_skills' => 'nullable|array',
                'gender' => 'required|in:Male,Female,Both',
                'languages' => 'nullable|array',
                'job_expiry' => 'required|date|after:today',
                'salary_from' => 'required|numeric|min:0',
                'salary_to' => 'nullable|numeric|min:0|gte:salary_from',
                'country_id' => 'required|exists:countries,id',
                'state_id' => 'required|exists:states,id',
                'cities' => 'nullable|array',
                'currency' => 'required|string|max:10',
                'min_experience' => 'required|integer|min:0',
                'shift' => 'required|in:Morning Shift,Evening Shift,Night Shift,Full-Time,Part-Time,Rotational Shifts,Standby / On-Call',
                'position' => 'required|string|max:255',
                'jd' => 'required|string',
                'hide_salary' => 'boolean',
                'hide_company' => 'boolean',
            ]);

            if ($validator->fails()) {
                Log::error('Validation failed', $validator->errors()->toArray());
                return back()->withErrors($validator)->withInput();
            }

            Job::create([
                'company_id' => $validator->validated()['company_name'],
                'job_title' => $validator->validated()['job_title'],
                'job_type' => $validator->validated()['job_type'],
                'job_category' => $validator->validated()['job_category'],
                'job_skills' => $validator->validated()['job_skills'] ?? [],
                'gender' => $validator->validated()['gender'],
                'languages' => $validator->validated()['languages'] ?? [],
                'job_expiry' => $validator->validated()['job_expiry'],
                'salary_from' => $validator->validated()['salary_from'],
                'salary_to' => $validator->validated()['salary_to'],
                'country_id' => $validator->validated()['country_id'],
                'state_id' => $validator->validated()['state_id'],
                'cities' => $validator->validated()['cities'] ?? [],
                'currency' => $validator->validated()['currency'],
                'min_experience' => $validator->validated()['min_experience'],
                'shift' => $validator->validated()['shift'],
                'position' => $validator->validated()['position'],
                'jd' => $validator->validated()['jd'],
                'hide_salary' => $request->has('hide_salary'),
                'hide_company' => $request->has('hide_company'),
                'created_by' => auth()->id(),
                'status' => true,
            ]);

            return redirect()->route('backend.jobs.index')->with('success', 'Job created successfully!');

        } catch (\Exception $e) {
            Log::error($e);
            abort('500');
        }
    }

    public function edit($encryptedId)
    {
        try {
            $jobId = decrypt($encryptedId);
            $companies = EmployerDetail::all();
            $languages = Language::all();
            $countries = Country::all();
            $aviationAreas = FuncationalArea::whereHas('industry', function ($q) {
                $q->where('name', 'Aviation');
            })->get();

            $nonAviationAreas = FuncationalArea::whereHas('industry', function ($q) {
                $q->where('name', '!=', 'Aviation');
            })->get();
            $job = Job::with('company', 'languages')->findOrFail($jobId);
            return view('backend.jobs.edit', compact('job', 'companies', 'languages', 'countries', 'aviationAreas', 'nonAviationAreas', ));
        } catch (\Exception $e) {
            Log::error($e);
            abort('500');
        }
    }

    public function update(Request $request, $encryptedId)
    {
        try {
            $jobId = decrypt($encryptedId);
            $job = Job::findOrFail($jobId);

            $validated = $request->validate([
                'company_name' => 'required|exists:employer_details,id',
                'job_title' => 'required|string|max:255',
                'job_type' => 'required|in:Aviation,Non-Aviation',
                'job_category' => 'required|string|max:255',
                'job_skills' => 'required|string',
                'gender' => 'required|in:Male,Female,Both',
                'languages' => 'nullable|array',
                'job_expiry' => 'required|date|after_or_equal:today',
                'salary_from' => 'required|numeric|min:0',
                'salary_to' => 'required|numeric|gte:salary_from',
                'country_id' => 'required|exists:countries,id',
                'state_id' => 'required|exists:states,id',
                'cities' => 'nullable|string',
                'currency' => 'required|string|max:10',
                'min_experience' => 'required|integer|min:0',
                'shift' => 'required|string|max:50',
                'position' => 'required|string|max:255',
                'jd' => 'required|string',
                'hide_salary' => 'boolean',
                'hide_company' => 'boolean',
            ]);

            try {
                $jobTitle = Jobtitle::firstOrCreate(
                    ['name' => $validated['job_title']],
                    ['slug' => Str::slug($validated['job_title'])]
                );
            } catch (QueryException $e) {
                $jobTitle = Jobtitle::where('name', $validated['job_title'])->first();
            }

            $skillsArray = array_map('trim', explode(',', $validated['job_skills']));
            $skillIds = [];
            foreach ($skillsArray as $skillName) {
                if (!empty($skillName)) {
                    try {
                        $skill = Skill::firstOrCreate(
                            ['name' => $skillName],
                            ['slug' => Str::slug($skillName)]
                        );
                    } catch (QueryException $e) {
                        $skill = Skill::where('name', $skillName)->first();
                    }
                    $skillIds[] = $skill->id;
                }
            }

            $job->update([
                'company_id' => $validated['company_name'],
                'job_title' => $validated['job_title'],
                'job_type' => $validated['job_type'],
                'job_category' => $validated['job_category'],
                'job_skills' => json_encode($skillsArray),
                'gender' => $validated['gender'],
                'job_expiry' => $validated['job_expiry'],
                'salary_from' => $validated['salary_from'],
                'salary_to' => $validated['salary_to'],
                'country_id' => $validated['country_id'],
                'state_id' => $validated['state_id'],
                'cities' => $validated['cities'] ?? null,
                'currency' => $validated['currency'],
                'min_experience' => $validated['min_experience'],
                'shift' => $validated['shift'],
                'position' => $validated['position'],
                'jd' => $validated['jd'],
                'hide_salary' => $request->has('hide_salary'),
                'hide_company' => $request->has('hide_company'),
                'created_by' => auth()->id(),
            ]);

            if ($request->has('languages')) {
                $job->languages()->sync($validated['languages']);
            }

            return redirect()
                ->route('backend.jobs.index')
                ->with('success', 'Job updated successfully.');
        } catch (\Exception $e) {
            Log::error($e);
            abort('500');
        }
    }
}
