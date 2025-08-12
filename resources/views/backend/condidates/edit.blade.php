@extends('layouts.backend.main')
@section('main-section')
    <div class="page-wrapper">
        <div class="page-titles">
            <div class="row">
                <div class="col-8 align-self-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-flex align-items-center">
                            <li class="breadcrumb-item">
                                <a href="{{ route('backend.dashboard') }}" class="link"><i
                                        class="ri-home-3-line fs-5"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Candidate</li>
                        </ol>
                        <h3 class="mb-0 fw-bold">Edit Candidate</h3>
                    </nav>
                </div>
                <div class="col-4 d-flex align-items-center justify-content-end">
                    <a href="javascript:void(0)" onclick="history.back()"
                        class="btn btn-sm d-flex align-items-center ms-3 addButton"><i
                            class="ri-arrow-go-back-line"></i>Back</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form id="formSubmit" action="{{ route('backend.condidate_update', [$condidate->id]) }}" method="POST">
                        @csrf
                        <div class="card borderRadius">
                            <div class="card-body p-3">
                                <div class="row formselector">
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">First Name <span class="text-danger"> *</span></label>
                                            <input type="text" name="first_name" placeholder="First Name"
                                                class="form-control typeText" value="{{ $condidate->first_name }}">
                                            @error('first_name')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Last Name <span class="text-danger"> *</span></label>
                                            <input type="text" name="last_name" placeholder="Last Name"
                                                class="form-control typeText" value="{{ $condidate->last_name }}">
                                            @error('last_name')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Email<span class="text-danger"> *</span></label>
                                            <input type="email" name="email" placeholder="Email" class="form-control"
                                                value="{{ $condidate->email }}">
                                            @error('email')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Father Name<span class="text-danger"> *</span></label>
                                            <input type="text" name="father_name" placeholder="Father Name"
                                                class="form-control typeText"
                                                value="{{ $condidate->getCondidateDetail->father_name }}">
                                            @error('father_name')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Birth Date <span class="text-danger"> *</span></label>
                                            <input type="date" name="date_of_birth" placeholder="Birth Date"
                                                class="form-control"
                                                value="{{ Carbon\Carbon::parse($condidate->getCondidateDetail->date_of_birth)->format('Y-m-d') }}"
                                                max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                            @error('date_of_birth')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Gender <span class="text-danger">*</span></label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="gender" type="radio"
                                                    value="Male" id="flexRadioDefault1"
                                                    {{ $condidate->getCondidateDetail->gender == 'Male' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexRadioDefault1">Male</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="gender" type="radio"
                                                    value="Female" id="flexRadioDefault2"
                                                    {{ $condidate->getCondidateDetail->gender == 'Female' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexRadioDefault2">Female</label>
                                            </div>
                                            @error('gender')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group select2form">
                                            <label class="text-dark ">Skill</label>
                                            <select class="select2 form-control block selectForm" name="skills[]"
                                                id="skills" multiple="multiple" style="width: 100%">
                                                <option disabled></option>
                                                <option value="HTML"
                                                    {{ in_array('HTML', $condidate->getCondidateDetail->skills) ? 'selected' : '' }}>
                                                    HTML</option>
                                                <option value="CSS"
                                                    {{ in_array('CSS', $condidate->getCondidateDetail->skills) ? 'selected' : '' }}>
                                                    CSS</option>
                                                <option value="Javascript"
                                                    {{ in_array('Javascript', $condidate->getCondidateDetail->skills) ? 'selected' : '' }}>
                                                    Javascript</option>
                                                <option value="Jquery"
                                                    {{ in_array('Jquery', $condidate->getCondidateDetail->skills) ? 'selected' : '' }}>
                                                    Jquery</option>
                                            </select>
                                            @error('sikills')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group select2form">
                                            <label class="text-dark">Languages</label>
                                            <select class="select2 form-control block" name="languages[]" id="languages"
                                                multiple="multiple" style="width: 100%">
                                                <option value="english"
                                                    {{ in_array('english', $condidate->getCondidateDetail->language) ? 'selected' : '' }}>
                                                    English</option>
                                                <option value="hindi"
                                                    {{ in_array('hindi', $condidate->getCondidateDetail->language) ? 'selected' : '' }}>
                                                    Hindi</option>
                                            </select>
                                            @error('languages')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Marital Status <span class="text-danger">
                                                    *</span></label>
                                            <select class="form-control selectForm" name="marital_status"
                                                id="marital_status" style="width: 100%;">
                                                <option value="">--Select--</option>
                                                <option value="Single"
                                                    {{ $condidate->getCondidateDetail->marital_status == 'Single' ? 'selected' : '' }}>
                                                    Single</option>
                                                <option value="Married"
                                                    {{ $condidate->getCondidateDetail->marital_status == 'Married' ? 'selected' : '' }}>
                                                    Married</option>
                                            </select>
                                            @error('marital_status')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Nationality <span class="text-danger">
                                                    *</span></label>
                                            <input type="text" name="nationality" placeholder="Nationality"
                                                class="form-control typeText"
                                                value="{{ $condidate->getCondidateDetail->nationality }}">
                                            @error('nationality')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">National ID Card <span class="text-danger">
                                                    *</span></label>
                                            <input type="text" name="national_id_card" placeholder="National ID Card"
                                                class="form-control text-uppercase" maxlength="12"
                                                value="{{ $condidate->getCondidateDetail->national_id_card }}">
                                            @error('national_id_card')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Country <span class="text-danger"> *</span></label>
                                            <select class="form-control selectForm" name="country" id="country"
                                                style="width: 100%;">
                                                <option value="">--Select--</option>
                                                <option value="India"
                                                    {{ $condidate->country == 'India' ? 'selected' : '' }}>India</option>
                                                <option value="Australia"
                                                    {{ $condidate->country == 'Australia' ? 'selected' : '' }}>Australia
                                                </option>
                                                <option value="America"
                                                    {{ $condidate->country == 'America' ? 'selected' : '' }}>America
                                                </option>
                                            </select>
                                            @error('country')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">State <span class="text-danger"> *</span></label>
                                            <select class="form-control selectForm" name="state" id="state"
                                                style="width: 100%;">
                                                <option value="">--Select--</option>
                                                <option valu="Uttar Pradesh"
                                                    {{ $condidate->state == 'Uttar Pradesh' ? 'selected' : '' }}>Uttar
                                                    Pradesh</option>
                                            </select>
                                            @error('state')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">City <span class="text-danger"> *</span></label>
                                            <select class="form-control selectForm" name="city" id="city"
                                                style="width: 100%;">
                                                <option value="">--Select--</option>
                                                <option value="New Delhi"
                                                    {{ $condidate->city == 'New Delhi' ? 'selected' : '' }}>New Delhi
                                                </option>
                                            </select>
                                            @error('city')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Mobile Number <span class="text-danger">
                                                    *</span></label>
                                            <input type="number" name="phone" placeholder="Mobile Number"
                                                class="form-control typeNumber" value="{{ $condidate->phone }}">
                                            @error('phone')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Experience: (In Years) <span class="text-danger">
                                                    *</span></label>
                                            <input type="number" name="experience_in_year"
                                                placeholder="Experience: (In Years)" class="form-control yearExp"
                                                value="{{ $condidate->getCondidateDetail->experience }}">
                                            @error('experience_in_year')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Career Level <span class="text-danger">
                                                    *</span></label>
                                            <select class="form-control selectForm" name="career_level" id="career_level"
                                                style="width: 100%;">
                                                <option value="">--Select--</option>
                                                <option value="Developer"
                                                    {{ $condidate->getCondidateDetail->career_level == 'Developer' ? 'selected' : '' }}>
                                                    Developer</option>
                                            </select>
                                            @error('career_level')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Functional Area <span class="text-danger">
                                                    *</span></label>
                                            <select class="form-control selectForm" name="functional_area"
                                                id="functional_area" style="width: 100%;">
                                                <option value="">--Select--</option>
                                                <option value="ABC"
                                                    {{ $condidate->getCondidateDetail->functional_area == 'ABC' ? 'selected' : '' }}>
                                                    ABC</option>
                                            </select>
                                            @error('career_level')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Current Salary <span class="text-danger">
                                                    *</span></label>
                                            <input type="number" name="current_salary" placeholder="Current Salary"
                                                class="form-control"
                                                value="{{ $condidate->getCondidateDetail->current_salary }}">
                                            @error('current_salary')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Expected Salary <span class="text-danger">
                                                    *</span></label>
                                            <input type="number" name="expected_salary" placeholder="Expected Salary"
                                                class="form-control"
                                                value="{{ $condidate->getCondidateDetail->expected_salary }}">
                                            @error('expected_salary')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Salary Currency<span class="text-danger">
                                                    *</span></label>
                                            <select class="form-control bg-white" name="salary_currency"
                                                id="salary_currency">
                                                <option value="">--Select--</option>
                                                <option value="INR"
                                                    {{ $condidate->getCondidateDetail->salary_currency == 'INR' ? 'selected' : '' }}>
                                                    INR</option>
                                            </select>
                                            @error('salary_currency')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="title">Facebook URL</label>
                                            <div class="input-group">
                                                <span class="input-grouptext"><i class="ri-facebook-line"></i></span>
                                                <input class="form-control" name="facebook_url"
                                                    placeholder="https://www.facebook.com/" type="text"
                                                    value="{{ $condidate->getCondidateDetail->facebook_url }}">
                                            </div>
                                            @error('facebook_url')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="title">Linkedin URL</label>
                                            <div class="input-group">
                                                <span class="input-grouptext"><i class="ri-linkedin-line"></i></span>
                                                <input class="form-control" name="linkedin_url"
                                                    placeholder="https://in.linkedin.com/" type="text"
                                                    value="{{ $condidate->getCondidateDetail->linkedin_url }}">
                                            </div>
                                            @error('linkedin_url')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-sm-6 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="title">Address<span class="text-danger">
                                                    *</span></label>
                                            <textarea style="width: 100%; height: 100px;" name="address" placeholder="Address">{{ $condidate->getCondidateDetail->address }}</textarea>
                                            @error('address')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="title">Available At<span
                                                    class="text-danger"> *</span></label>
                                            <input class="form-control" name="available_at" placeholder="Available At"
                                                type="date"
                                                value="{{ Carbon\Carbon::parse($condidate->getCondidateDetail->available_at)->format('Y-m-d') }}"
                                                min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                            @error('available_at')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="text-dark" for="title">Status </label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="availablity" type="radio"
                                                    value="Immediate Available" id="availablity1"
                                                    {{ $condidate->getCondidateDetail->availability == 'Immediate Available' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="languageRadio1">Immediate
                                                    Available</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="availablity" type="radio"
                                                    value="Not Immediate Available" id="availablity2"
                                                    {{ $condidate->getCondidateDetail->availability == 'Not Immediate Available' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="languageRadio2">
                                                    Not Immediate Available
                                                </label>
                                            </div>
                                            @error('availablity')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="submitBtn mt-5 d-flex justify-content-end gap-3">
                                    <button type="submit" class="btn btnBg text-white">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@section('javascript-section')
    <script>
        $(document).ready(function() {
            $('#skills').select2({
                placeholder: "Select Skills",
                allowClear: true
            });
            $('#languages').select2({
                placeholder: "Select Languages",
                allowClear: true
            });
            $("#marital_status, #country, #state, #city, #career_level, #functional_area, #salary_currency")
                .select2({
                    allowClear: true
                });
        });
        ClassicEditor.create(document.querySelector('#editor')).catch(error => {
            console.error(error);
        });
    </script>
@endsection
@endsection
