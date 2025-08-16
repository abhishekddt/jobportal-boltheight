<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\CondidateDetail;
use App\Models\CandidateJobPosition;
use App\Models\User;
use App\Models\Backend\City;
use App\Models\Backend\Country;
use App\Models\Backend\State;
use App\Models\CandidateEducation;
use App\Models\EmploymentDetail;
use App\Models\ITSkill;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class HomeController extends Controller
{

    public function home()
    {
        try {
            $user = auth()->user();
            $candidate = CondidateDetail::where('user_id', $user->id)->first();
            $lastUpdated = $candidate->updated_at ?? $user->updated_at;
            $lastUpdatedHuman = $lastUpdated ? Carbon::parse($lastUpdated)->diffForHumans() : 'Not updated yet';
            $employmenthome = EmploymentDetail::where('user_id', auth()->id())
                ->latest('created_at')
                ->first();
            $countries = Country::all();
            $states = State::all();
            $cities = City::all();

            return view('frontend.home', compact('user', 'candidate', 'lastUpdatedHuman', 'countries', 'states', 'cities', 'employmenthome'));
        } catch (\Exception $e) {
            abort(500);
        }
    }

    public function userprofile()
    {
        $user = auth()->user();
        $candidate = CondidateDetail::where('user_id', $user->id)->first();
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $employmenthome = EmploymentDetail::where('user_id', auth()->id())
            ->latest('created_at')
            ->first();
        $educations = CandidateEducation::where('user_id', auth()->id())
            ->orderBy('course', 'asc')
            ->get();

        $employments = EmploymentDetail::where('user_id', auth()->id())->orderBy('experience', 'desc')->get();
        $itskills = ITSkill::where('user_id', auth()->id())
            ->orderBy('skill', 'desc')
            ->get();

        $candidateDetail = CondidateDetail::with([
            'jobPosition.country',
            'user',
        ])->where('user_id', $user->id)->first();
        $lastUpdated = $candidate->updated_at ?? $user->updated_at;
        $lastUpdatedHuman = $lastUpdated ? Carbon::parse($lastUpdated)->diffForHumans() : 'Not updated yet';

        $skillMap = [
            'it_security' => 'It Security',
            'chat_support' => 'Chat Support',
            'project_management' => 'Project Management',
            'ithead' => 'It Head',
        ];

        $skills = [];
        $decodedSkills = [];
        if (!empty($candidate->skills)) {
            if (is_array($candidate->skills)) {
                $decodedSkills = $candidate->skills;
            } else {
                $decodedSkills = json_decode($candidate->skills, true);
            }

            if (is_array($decodedSkills)) {
                foreach ($decodedSkills as $skillKey) {
                    $skills[] = $skillMap[$skillKey] ?? ucfirst(str_replace('_', ' ', $skillKey));
                }
            }
        }

        $selectedSkillKeys = is_array($decodedSkills) ? $decodedSkills : [];
        return view('frontend.user_profile', compact(
            'user',
            'candidate',
            'countries',
            'states',
            'cities',
            'lastUpdatedHuman',
            'skills',
            'selectedSkillKeys',
            'educations',
            'itskills',
            'candidateDetail',
            'employments',
            'employmenthome',
        ));
    }

    public function jobsdashboard()
    {
        $user = auth()->user();
        $candidate = CondidateDetail::where('user_id', $user->id)->first();
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();

        return view('frontend.jobs', compact('user', 'candidate', 'countries', 'states', 'cities'));
    }


    public function applyJobs()
    {
        $user = auth()->user();
        $candidate = CondidateDetail::where('user_id', $user->id)->first();
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        return view('frontend.apply_jobs', compact('user', 'candidate', 'countries', 'states', 'cities'));
    }

    public function aviation()
    {
        $user = auth()->user();

        $candidateDetail = CondidateDetail::with([
            'jobPosition.country',
            'user',
        ])->where('user_id', $user->id)->first();

        $employmenthome = EmploymentDetail::where('user_id', auth()->id())
            ->latest('created_at')
            ->first();

        $candidate = CondidateDetail::where('user_id', $user->id)->first();
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $employments = EmploymentDetail::where('user_id', auth()->id())->orderBy('experience', 'desc')->get();
        $educations = CandidateEducation::where('user_id', auth()->id())
            ->orderBy('course', 'asc')
            ->get();
        $itskills = ITSkill::where('user_id', auth()->id())
            ->orderBy('skill', 'desc')
            ->get();
        $lastUpdated = $candidate->updated_at ?? $user->updated_at;
        $lastUpdatedHuman = $lastUpdated ? Carbon::parse($lastUpdated)->diffForHumans() : 'Not updated yet';

        $skillMap = [
            'it_security' => 'It Security',
            'chat_support' => 'Chat Support',
            'project_management' => 'Project Management',
            'ithead' => 'It Head',
            'abhishek kushwaha' => 'Abhishek Kushwaha'
        ];

        $skills = [];
        $decodedSkills = [];
        if (!empty($candidate->skills)) {
            if (is_array($candidate->skills)) {
                $decodedSkills = $candidate->skills;
            } else {
                $decodedSkills = json_decode($candidate->skills, true);
            }

            if (is_array($decodedSkills)) {
                foreach ($decodedSkills as $skillKey) {
                    $skills[] = $skillMap[$skillKey] ?? ucfirst(str_replace('_', ' ', $skillKey));
                }
            }
        }

        $selectedSkillKeys = is_array($decodedSkills) ? $decodedSkills : [];
        return view('frontend.aviation', compact(
            'user',
            'candidate',
            'countries',
            'states',
            'cities',
            'lastUpdatedHuman',
            'skills',
            'selectedSkillKeys',
            'educations',
            'itskills',
            'candidateDetail',
            'employments',
            'employmenthome',
        ));
    }

    public function updateProfileDetails(Request $request)
    {

        Log::info('Received personal request', ['request_data' => $request->all()]);

        $user = auth()->user();

        $request->validate([
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $user->id,
            'gender' => 'nullable|string|in:Male,Female',
            'country_id' => 'nullable|integer|exists:countries,id',
            'state_id' => 'nullable|integer|exists:states,id',
            'city_id' => 'nullable|integer|exists:cities,id',
            'availability' => 'nullable|string',
            'is_experienced' => 'nullable|boolean',
        ]);

        $user->update([
            'name' => $request->first_name . ' ' . $request->last_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'gender' => $request->gender,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
        ]);

        $candidate = CondidateDetail::firstOrNew(['user_id' => $user->id]);
        $candidate->availability = $request->availability;
        $candidate->is_experienced = $request->is_experienced;
        $candidate->save();

        Log::info('User personal details updated successfully', ['user_id' => $user->id]);

        return redirect()->back()->with('success', 'Personal details updated successfully.');
    }

    public function updateSkill(Request $request)
    {
        try {
            $user = auth()->user();

            $request->validate([
                'skills' => 'required|array|min:1',
            ]);

            $candidate = CondidateDetail::firstOrNew(['user_id' => $user->id]);
            $candidate->skills = $request->skills;
            $candidate->save();

            return response()->json([
                'status' => true,
                'message' => 'Skills updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error updating skills: ' . $e->getMessage()
            ], 500);
        }
    }

    // public function updateEmployement(Request $request)
    // {
    //     try {
    //         $user = auth()->user();

    //         $request->validate([
    //             'experience' => 'required',
    //             'experience_month' => 'required',
    //             'company_name' => 'required|string',
    //             'job_title' => 'required|string|max:250',
    //             'joining_date' => 'required|date',
    //             'current_salary' => 'required|numeric',
    //             'notice_period' => 'required',
    //             'job_profile' => 'required',
    //             'is_current_employment' => 'required',
    //             'employment_type' => 'required',
    //         ]);

    //         $candidate = CondidateDetail::firstOrNew(['user_id' => $user->id]);
    //         $candidate->experience = $request->experience;
    //         $candidate->experience_month = $request->experience_month;
    //         $candidate->company_name = $request->company_name;
    //         $candidate->job_title = $request->job_title;
    //         $candidate->joining_date = $request->joining_date;
    //         $candidate->current_salary = $request->current_salary;
    //         $candidate->notice_period = $request->notice_period;
    //         $candidate->job_profile = $request->job_profile;
    //         $candidate->is_current_employment = $request->is_current_employment;
    //         $candidate->employment_type = $request->employment_type;
    //         $candidate->save();

    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Employment updated successfully',
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Error updating employment: ' . $e->getMessage(),
    //         ], 500);
    //     }
    // }


    // All Controller related to Employment
    public function addEmploymentDetails(Request $request)
    {
        try {
            $user = auth()->user();

            $request->validate([
                'company_name' => 'required',
                'job_title' => 'required',
                'experience' => 'required|date_format:Y-m',
                'is_current_employment' => 'required',
                'notice_period' => 'required_if:is_current_employment,1|nullable',
            ]);

            $joiningDate = \Carbon\Carbon::createFromFormat('Y-m', $request->experience)->startOfMonth();
            $currentDate = \Carbon\Carbon::now()->startOfMonth();

            $diff = $joiningDate->diff($currentDate);
            $experienceFormatted = "{$diff->y} Years {$diff->m} Months";

            $employment = new EmploymentDetail();
            $employment->user_id = $user->id;
            $employment->company_name = $request->company_name;
            $employment->job_title = $request->job_title;
            $employment->joining_date = $joiningDate;
            $employment->experience = $experienceFormatted;
            $employment->is_current_employment = $request->is_current_employment;
            $employment->notice_period = $request->notice_period;
            $employment->save();

            return response()->json([
                'status' => true,
                'message' => 'Employment details added successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error adding employment details: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateEmploymentDetails(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required',
            'job_title' => 'required',
            'experience' => 'required|date_format:Y-m',
            'is_current_employment' => 'required|in:0,1',
            'notice_period' => 'required_if:is_current_employment,1|nullable',
        ]);

        $user = auth()->user();

        $joiningDate = \Carbon\Carbon::createFromFormat('Y-m', $request->experience)->startOfMonth();
        $currentDate = now()->startOfMonth();
        $diff = $joiningDate->diff($currentDate);
        $experienceFormatted = "{$diff->y} Years {$diff->m} Months";

        $employment = EmploymentDetail::where('id', $id)
            ->where('user_id', $user->id)
            ->firstOrFail();

        $employment->update([
            'company_name' => $request->company_name,
            'job_title' => $request->job_title,
            'joining_date' => $joiningDate,
            'experience' => $experienceFormatted,
            'is_current_employment' => $request->is_current_employment,
            'notice_period' => $request->is_current_employment == 1 ? $request->notice_period : null,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Employment details updated successfully',
        ]);
    }




    public function deleteEmploymentDetails($id)
    {
        try {
            $user = auth()->user();
            $employment = EmploymentDetail::where('id', $id)->where('user_id', $user->id)->firstOrFail();
            $employment->delete();
            return response()->json([
                'status' => true,
                'message' => 'Employment details deleted successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error deleting education details: ' . $e->getMessage(),
            ]);
        }
    }



    // public function updateitSkills(Request $request){

    //    try{

    //    }catch(\Exception $e){
    //     return response()->json([
    //         'status' => false,
    //         'message' => 'Error updating IT skills: ' . $e->getMessage(),
    //     ],500);
    //    }
    // }

    public function updateprofileSummary(Request $request)
    {
        try {
            $user = auth()->user();
            $request->validate([
                'profile_summary' => 'required',
            ]);

            $candidate = CondidateDetail::firstOrNew(['user_id' => $user->id]);
            $candidate->profile_summary = $request->profile_summary;
            $candidate->save();

            return response()->json([
                'status' => true,
                'message' => 'Profile summary updated successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error updating profile summary: ' . $e->getMessage(),
            ], 500);
        }
    }


    public function updateuserprofileDetails(Request $request)
    {
        try {
            $user = auth()->user();
            $request->validate([
                'profile_summary' => 'required',
            ]);

            $candidate = CondidateDetail::firstOrNew(['user_id' => $user->id]);
            $candidate->profile_summary = $request->profile_summary;
            $candidate->save();

            return response()->json([
                'status' => true,
                'message' => 'Your Profile summary updated successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error updating profile summary: ' . $e->getMessage(),
            ], 500);
        }
    }


    public function addEducationDetails(Request $request)
    {
        try {
            $user = auth()->user();

            $request->validate([
                'course' => 'required|string|max:255',
                'university' => 'required|string|max:120',
                'course_type' => 'required|string',
                'start_year' => 'required',
                'end_year' => 'required',
            ]);

            $education = new CandidateEducation();
            $education->user_id = $user->id;
            $education->course = $request->course;
            $education->university = $request->university;
            $education->course_type = $request->course_type;
            $education->start_year = $request->start_year;
            $education->end_year = $request->end_year;
            $education->save();

            return response()->json([
                'status' => true,
                'message' => 'Education details added successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error adding education details: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateEducationDetails(Request $request, $id)
    {
        $request->validate([
            'course' => 'required|string|max:255',
            'university' => 'required|string|max:120',
            'course_type' => 'required|string',
            'start_year' => 'required',
            'end_year' => 'required',
        ]);

        $user = auth()->user();

        $education = CandidateEducation::where('id', $id)
            ->where('user_id', $user->id)
            ->firstOrFail();

        $education->update([
            'course' => $request->course,
            'university' => $request->university,
            'course_type' => $request->course_type,
            'start_year' => $request->start_year,
            'end_year' => $request->end_year,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Education details updated successfully',
        ]);
    }

    public function deleteEducationDetails($id)
    {
        try {
            $user = auth()->user();
            $education = CandidateEducation::where('id', $id)->where('user_id', $user->id)->firstOrFail();
            $education->delete();
            return response()->json([
                'status' => true,
                'message' => 'Education details deleted successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error deleting education details: ' . $e->getMessage(),
            ]);
        }
    }

    // All Controllers related to it skills
    public function addItSkills(Request $request)
    {
        try {
            $user = auth()->user();

            $request->validate([
                'skill' => 'required',
                'software_version' => 'required',
                'last_used_software_year' => 'required',
                'software_experience_year' => 'required',
                'software_experience_month' => 'required',
            ]);

            $itskills = new ITSkill();
            $itskills->user_id = $user->id;
            $itskills->skill = $request->skill;
            $itskills->software_version = $request->software_version;
            $itskills->last_used_software_year = $request->last_used_software_year;
            $itskills->software_experience_year = $request->software_experience_year;
            $itskills->software_experience_month = $request->software_experience_month;
            $itskills->save();

            return response()->json([
                'status' => true,
                'message' => 'IT Skills added successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error adding IT skills: ' . $e->getMessage(),
            ]);
        }
    }

    public function updateItSkills(Request $request, $id)
    {
        $request->validate([
            'skill' => 'required',
            'software_version' => 'required',
            'last_used_software_year' => 'required',
            'software_experience_year' => 'required',
            'software_experience_month' => 'required',
        ]);

        $user = auth()->user();

        $itskill = ITSkill::where('id', $id)
            ->where('user_id', $user->id)
            ->firstOrFail();

        $itskill->update([
            'skill' => $request->skill,
            'software_version' => $request->software_version,
            'last_used_software_year' => $request->last_used_software_year,
            'software_experience_year' => $request->software_experience_year,
            'software_experience_month' => $request->software_experience_month,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'IT Skill details updated successfully',
        ]);
    }

    public function deleteItSkills($id)
    {
        try {
            $user = auth()->user();
            $education = ITSkill::where('id', $id)->where('user_id', $user->id)->firstOrFail();
            $education->delete();
            return response()->json([
                'status' => true,
                'message' => 'IT Skill details deleted successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error deleting education details: ' . $e->getMessage(),
            ]);
        }
    }

    public function addPersonalDetails(Request $request)
    {
        try {
            $user = auth()->user();

            $request->validate([
                'career_break' => 'required',
                'date_of_birth' => 'required|date',
                'marital_status' => 'required',
                'language' => 'required|array',
                'language.*' => 'string',
                'permanent_address' => 'required',
                'hometown' => 'required',
                'pincode' => 'required|numeric'
            ]);

            $CondidatePersonalDetails = CondidateDetail::firstOrNew(['user_id' => $user->id]);
            $CondidatePersonalDetails->career_break = $request->career_break;
            $CondidatePersonalDetails->date_of_birth = $request->date_of_birth;
            $CondidatePersonalDetails->marital_status = $request->marital_status;
            $CondidatePersonalDetails->language = is_string($request->language)
                ? json_decode($request->language, true)
                : $request->language;
            $CondidatePersonalDetails->permanent_address = $request->permanent_address;
            $CondidatePersonalDetails->hometown = $request->hometown;
            $CondidatePersonalDetails->pincode = $request->pincode;
            $CondidatePersonalDetails->save();

            return response()->json([
                'status' => true,
                'message' => 'Personal details saved successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error adding personal details: ' . $e->getMessage(),
            ]);
        }
    }

    public function updatePersonalDetails(Request $request)
    {
        try {
            $user = auth()->user();

            $request->validate([
                'career_break' => 'required',
                'date_of_birth' => 'required|date',
                'marital_status' => 'required',
                'language' => 'required|array',
                'language.*' => 'string|required',
                'permanent_address' => 'required',
                'hometown' => 'required',
                'pincode' => 'required|numeric'
            ]);

            $CondidatePersonalDetails = CondidateDetail::firstOrNew(['user_id' => $user->id]);
            $CondidatePersonalDetails->career_break = $request->career_break;
            $CondidatePersonalDetails->date_of_birth = $request->date_of_birth;
            $CondidatePersonalDetails->marital_status = $request->marital_status;
            $CondidatePersonalDetails->language = is_string($request->language)
                ? json_decode($request->language, true)
                : $request->language;
            $CondidatePersonalDetails->permanent_address = $request->permanent_address;
            $CondidatePersonalDetails->hometown = $request->hometown;
            $CondidatePersonalDetails->pincode = $request->pincode;
            $CondidatePersonalDetails->save();

            return response()->json([
                'status' => true,
                'message' => 'Personal details saved successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error adding personal details: ' . $e->getMessage(),
            ]);
        }
    }

    //upload controller
    public function storeresume(Request $request)
    {
        try {
            $request->validate([
                'candidate_resume' => 'required|mimes:pdf,doc,docx,rtf|max:2048',
            ]);

            $user = auth()->user();
            $file = $request->file('candidate_resume');

            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('resumes', $fileName, 'public');

            $candidate = CondidateDetail::firstOrNew(['user_id' => $user->id]);
            $candidate->candidate_resume = $filePath;
            $candidate->last_updated_resume = now();
            $candidate->save();

            return response()->json([
                'status' => true,
                'message' => 'Resume uploaded successfully.',
                'file_path' => asset('storage/' . $filePath),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Upload failed: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function storeProfileImage(Request $request)
    {
        try {
            $request->validate([
                'profile_image' => 'required|image|mimes:jpg,jpeg,png|max:10240',
            ]);

            $user = auth()->user();
            $file = $request->file('profile_image');

            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('profile_images', $fileName, 'public');

            $candidate = CondidateDetail::firstOrNew(['user_id' => $user->id]);

            if ($candidate->profile_image && Storage::disk('public')->exists($candidate->profile_image)) {
                Storage::disk('public')->delete($candidate->profile_image);
            }

            $candidate->profile_image = $filePath;
            $candidate->save();

            return response()->json([
                'status' => true,
                'message' => 'Profile image uploaded successfully.',
                'image_url' => asset('storage/' . $filePath),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Upload failed: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function addPilotDetail(Request $request)
    {
        try {
            $user = auth()->user();

            $request->validate([
                'preferred_location' => 'required',
                'date_of_last_flight' => 'required|date',
                'latest_fleet' => 'required',
                'latest_rank' => 'required',
                'certificate_no' => 'required',
                'country_of_licence' => 'required',
                'licence_no' => 'required',
                'total_hours_on_fleet' => 'required',
                'valid_medical' => 'required',
                'non_flying_position' => 'required',
            ]);

            $candidatePersonalDetails = CondidateDetail::firstOrCreate([
                'user_id' => $user->id
            ]);

            CandidateJobPosition::updateOrCreate(
                ['candidate_user_id' => $candidatePersonalDetails->id],
                $request->only([
                    'preferred_location',
                    'date_of_last_flight',
                    'latest_fleet',
                    'latest_rank',
                    'certificate_no',
                    'country_of_licence',
                    'licence_no',
                    'total_hours_on_fleet',
                    'valid_medical',
                    'non_flying_position',
                ])
            );

            return response()->json([
                'status' => true,
                'message' => 'Pilot details saved successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error: ' . $e->getMessage(),
            ]);
        }
    }



    public function addSkillDetail(Request $request)
    {
        try {
            $user = auth()->user();

            $request->validate([
                'preferred_location' => 'required',
                'latest_current_company' => 'required',
            ]);

            $candidatePersonalDetails = CondidateDetail::firstOrCreate([
                'user_id' => $user->id
            ]);

            CandidateJobPosition::updateOrCreate(
                ['candidate_user_id' => $candidatePersonalDetails->id],
                $request->only([
                    'preferred_location',
                    'latest_current_company'
                ])
            );

            return response()->json([
                'status' => true,
                'message' => 'Skill details saved successfully',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error: ' . $e->getMessage(),
            ], 500);
        }
    }



    public function addCabinCrewDetail(Request $request)
    {
        try {
            $user = auth()->user();

            $request->validate([
                'preferred_location' => 'required',
                'latest_fleet' => 'required',
                'cabin_crew_height' => 'required',
                'cabin_crew_weight' => 'required',
            ]);

            $candidatePersonalDetails = CondidateDetail::firstOrCreate([
                'user_id' => $user->id
            ]);

            CandidateJobPosition::updateOrCreate(
                ['candidate_user_id' => $candidatePersonalDetails->id],
                $request->only([
                    'preferred_location',
                    'latest_fleet',
                    'cabin_crew_height',
                    'cabin_crew_weight'
                ])
            );

            return response()->json([
                'status' => true,
                'message' => 'Cabin Crew details saved successfully',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error: ' . $e->getMessage(),
            ], 500);
        }
    }


    public function addEngineerDetail(Request $request)
    {
        try {
            $user = auth()->user();

            $request->validate([
                'preferred_location' => 'required',
                'latest_rank' => 'required',
                'certificate_no' => 'required',
                'country_of_licence' => 'required',
                'licence_no' => 'required',
                'engineer_latest_airframe' => 'required',
                'engineer_current_engine_type' => 'required',
            ]);

            $candidatePersonalDetails = CondidateDetail::firstOrCreate([
                'user_id' => $user->id
            ]);

            CandidateJobPosition::updateOrCreate(
                ['candidate_user_id' => $candidatePersonalDetails->id],
                $request->only([
                    'preferred_location',
                    'latest_rank',
                    'certificate_no',
                    'country_of_licence',
                    'licence_no',
                    'engineer_latest_airframe',
                    'engineer_current_engine_type'
                ])
            );

            return response()->json([
                'status' => true,
                'message' => 'Engineer details saved successfully',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error: ' . $e->getMessage(),
            ], 500);
        }
    }


    public function addDispatcherDetail(Request $request)
    {
        try {
            $user = auth()->user();

            $request->validate([
                'preferred_location' => 'required',
                'dispatcher_last_flight' => 'required',
                'latest_fleet' => 'required',
                'dispatcher_approval' => 'required',
                'dispatcher_approval_authority' => 'required',
                'certificate_no' => 'required',
                'country_of_licence' => 'required',
                'licence_no' => 'required',
            ]);

            $candidatePersonalDetails = CondidateDetail::firstOrCreate([
                'user_id' => $user->id
            ]);

            CandidateJobPosition::updateOrCreate(
                ['candidate_user_id' => $candidatePersonalDetails->id],
                $request->only([
                    'preferred_location',
                    'dispatcher_last_flight',
                    'latest_fleet',
                    'dispatcher_approval',
                    'dispatcher_approval_authority',
                    'certificate_no',
                    'country_of_licence',
                    'licence_no'
                ])
            );

            return response()->json([
                'status' => true,
                'message' => 'Dispatcher details saved successfully',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error: ' . $e->getMessage(),
            ], 500);
        }
    }


    public function welcomeEmail(){
        // return view('frontend.welcome-email');
        try {
            $user = auth()->user();
            $candidate = CondidateDetail::where('user_id', $user->id)->first();
            $lastUpdated = $candidate->updated_at ?? $user->updated_at;
            $lastUpdatedHuman = $lastUpdated ? Carbon::parse($lastUpdated)->diffForHumans() : 'Not updated yet';
            $employmenthome = EmploymentDetail::where('user_id', auth()->id())
                ->latest('created_at')
                ->first();
            $countries = Country::all();
            $states = State::all();
            $cities = City::all();

            return view('frontend.welcome-email', compact('user', 'candidate', 'lastUpdatedHuman', 'countries', 'states', 'cities', 'employmenthome'));
        } catch (\Exception $e) {
            abort(500);
        }
    }
}
