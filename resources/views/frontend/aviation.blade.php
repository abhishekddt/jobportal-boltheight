@extends('layouts.frontend.main')

@section('main-section')
    <section>
        <div class="container">
            <div class="card mt-4 mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 d-flex justify-content-center align-items-center ">
                            <div class="position-relative ">
                                <form id="profileImageUploadForm" enctype="multipart/form-data">
                                    <img class="profiles2"
                                        src="{{ optional($candidate)->profile_image ? asset('storage/' . optional($candidate)->profile_image) : asset('default_user.webp') }}"
                                        id="profile_image">
                                    <label for="upload_profile_img" class="set_profile_image">
                                        <i class="ri-camera-line"></i>
                                    </label>
                                    <input type="file" class="d-none" name="profile_image" accept="image, jpg, png"
                                        alt="image upload" id="upload_profile_img">
                                </form>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="profile_detaols2">
                                <div class="userName2 d-flex align-items-center gap-3">
                                    <div class="flex-grow-1">
                                        <h1 class="m-0 text-start">{{ Auth::user()->name ?? '' }}</h1>
                                        <p class="text-muted mb-0">Profile last updated: <span
                                                class="text-dark">{{ $lastUpdatedHuman }}</span></p>
                                    </div>
                                    <div>
                                        <button class="bg-transparent border-0" data-bs-toggle="modal"
                                            data-bs-target="#profile_edit">
                                            <i class="ri-pencil-line fs-5"></i>
                                        </button>
                                    </div>
                                </div>
                                <hr class="hr" style="width: 40%;">
                                <div class="d-flex gap-3">
                                    <div class="d-flex flex-column gap-3 border2">

                                        <span class="d-felx gap-3 text-muted textmuteds">
                                            <i class="ri-map-pin-line"></i>
                                            {{ optional($cities->firstWhere('id', $user->city))->name ?? 'City' }},
                                            {{ optional($states->firstWhere('id', $user->state))->name ?? 'State' }},
                                            {{ optional($countries->firstWhere('id', $user->country))->name ?? 'Country' }}
                                        </span>

                                        <span class="d-flex gap-1 text-muted">
                                            <i class="ri-briefcase-line"></i>
                                            @if (optional($candidate)->is_experienced == '1')
                                                <span>Experienced</span>
                                            @elseif (optional($candidate)->is_experienced == '0')
                                                <span>Inexperienced</span>
                                            @endif
                                        </span>
                                    </div>

                                    <div class="d-flex flex-column gap-3 border2">
                                        <span class="d-felx gap-3 text-muted textmuteds">
                                            <i class="ri-phone-line"></i>
                                            <span class="">
                                                {{ optional($user)->phone ?? 'N/A' }}
                                            </span>
                                        </span>

                                        <span class="d-felx gap-3 text-muted textmuteds">
                                            <i class="ri-shopping-bag-line"></i>
                                            @if (optional($candidate)->availability == '15_days')
                                                <span>Available within 15 days</span>
                                            @elseif (optional($candidate)->availability == '1_month')
                                                <span>Available within 30 days</span>
                                            @elseif (optional($candidate)->availability == '2_months')
                                                <span>Available within 60 days</span>
                                            @elseif (optional($candidate)->availability == '3_months')
                                                <span>Available within 90 days</span>
                                            @else
                                                <span>Availability not specified</span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 mobile_dnone">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="headings">Recommended Jobs for you</h3>
                            <hr>
                            <div>
                                <ul class="add_detals">

                                    <li>
                                        <span> Resume </span>
                                        <label for="resume-upload" class="text-primary"
                                            style="font-weight: 400; cursor: pointer;">
                                            Upload
                                        </label>
                                    </li>

                                    <li>
                                        <span> Key skills </span>
                                        <a href="#skill_add" data-bs-toggle="modal" data-bs-target="#skill_add">Add</a>
                                    </li>

                                    <li>
                                        <span> IT skills </span>
                                        <a href="javascript()" data-bs-toggle="modal" data-bs-target="#it_skill_add">Add</a>
                                    </li>
                                    <li>
                                        <span> Employment </span>
                                        <a href="javascript()" data-bs-toggle="modal" data-bs-target="#employment">Add</a>
                                    </li>
                                    <li>
                                        <span> Education </span>
                                        <a href="javascript()" data-bs-toggle="modal" data-bs-target="#education">Add</a>
                                    </li>

                                    <li>
                                        <span> Profile summary </span>
                                        <a href="javascript()" data-bs-toggle="modal"
                                            data-bs-target="#profile_summry">Add</a>
                                    </li>

                                    <li>
                                        <span> Personal details</span>
                                        <a href="javascript()" data-bs-toggle="modal"
                                            data-bs-target="#personal_details">Add</a>
                                    </li>

                                    <li>
                                        <span> Licence/Cirtification</span>
                                        <a href="javascript()" data-bs-toggle="modal"
                                            data-bs-target="#personal_details">Add</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label mb-2">Select Job Position<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control selects1" name="job_position" required id="aviation_form"
                                        style="border: 1px solid #86b7fe;">
                                        <option selected disabled>Select Job Position</option>
                                        <option value="pilot">Pilot</option>
                                        {{-- <option value="skilled_non_skilled">Skilled / Non Skilled Staff Job</option> --}}
                                        <option value="skilled_non_skilled">Skilled Staff Job</option>
                                        <option value="cabin_crew">Cabin Crew</option>
                                        <option value="engineer">Engineer</option>
                                        <option value="dispatcher">Dispatcher</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form_container">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>
                                            <strong>Pilot</strong>
                                            <a class="text-decoration-none text-dark" data-bs-toggle="modal"
                                                data-bs-target="#pilot"><i class="ri-pencil-line"></i></a>
                                        </span>
                                        <!-- <a class="add_profile_details text-decoration-none" type="button" data-bs-toggle="modal" data-bs-target="#aviation" >Add </a>   -->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="personal-info">
                                                <p class="p_font mb-0 text-muted">Preferred Location</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition)->preferred_location }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="personal_info">
                                                <p class="p_font mb-0 text-muted">Licence/Certificate*</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition)->certificate_no }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal_info">
                                                <p class="p_font mb-0 text-muted">Licence Authority</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition)->certificate_no }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal_info">
                                                <p class="p_font mb-0 text-muted">Country of Licence/Approval</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition->country)->name }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal_info">
                                                <p class="p_font mb-0 text-muted">Licence Number</p>
                                                <p><strong
                                                        class="text-muted p_font">{{ optional($candidateDetail->jobPosition)->licence_no }}</strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal_info">
                                                <p class="p_font mb-0 text-muted">Select Latest Fleet</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition)->latest_fleet }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal_info">
                                                <p class="p_font mb-0 text-muted">Select Latest Rank</p>
                                                <p><strong
                                                        class="text-muted p_font">{{ optional($candidateDetail->jobPosition)->latest_rank }}</strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal_info">
                                                <p class="p_font mb-0 text-muted">Total Hours on Fleet in Rank</p>
                                                <p><strong
                                                        class="text-muted p_font">{{ optional($candidateDetail->jobPosition)->total_hours_on_fleet ?? 'N/A' }}</strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal_info">
                                                <p class="p_font mb-0 text-muted">Select Valid Medical</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        @if (optional($candidateDetail->jobPosition)->valid_medical === 'Yes')
                                                            Yes
                                                        @elseif (optional($candidateDetail->jobPosition)->valid_medical === 'No')
                                                            No
                                                        @endif
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal_info">
                                                <p class="p_font mb-0 text-muted">Other Non-Flying Position</p>
                                                <p><strong
                                                        class="text-muted p_font">{{ optional($candidateDetail->jobPosition)->non_flying_position }}</strong>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="personal_info">
                                                <p class="p_font mb-0 text-muted">Date Of Last Flight</p>
                                                <p><strong
                                                        class="text-muted p_font">{{ optional($candidateDetail->jobPosition)->date_of_last_flight ?? 'N/A' }}</strong>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Skill Details  --}}
                            <div class="form_container">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>
                                            <strong>Skills</strong>
                                            <a class="text-decoration-none text-dark" data-bs-toggle="modal"
                                                data-bs-target="#skilled_non_skilled"><i class="ri-pencil-line"></i></a>
                                        </span>
                                        <!-- <a class="add_profile_details text-decoration-none" type="button" data-bs-toggle="modal" data-bs-target="#aviation" >Add </a>   -->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="personal-info">
                                                <p class="p_font mb-0 text-muted">Preferred Location</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition)->preferred_location }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal-info">
                                                <p class="p_font mb-0 text-muted">Preferred Location</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition)->latest_current_company }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Cabin Crew Details  --}}
                            <div class="form_container">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>
                                            <strong>Cabin Crew</strong>
                                            <a class="text-decoration-none text-dark" data-bs-toggle="modal"
                                                data-bs-target="#cabin_crew"><i class="ri-pencil-line"></i></a>
                                        </span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="personal-info">
                                                <p class="p_font mb-0 text-muted">Preferred Location</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition)->preferred_location }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal-info">
                                                <p class="p_font mb-0 text-muted">Latest Fleet</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition)->latest_fleet }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal-info">
                                                <p class="p_font mb-0 text-muted">Height</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition)->cabin_crew_height }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal-info">
                                                <p class="p_font mb-0 text-muted">Weight</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition)->cabin_crew_weight }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Engineer Details --}}
                            <div class="form_container">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>
                                            <strong>Engineer</strong>
                                            <a class="text-decoration-none text-dark" data-bs-toggle="modal"
                                                data-bs-target="#engineer"><i class="ri-pencil-line"></i></a>
                                        </span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="personal-info">
                                                <p class="p_font mb-0 text-muted">Preferred Location</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition)->preferred_location }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal-info">
                                                <p class="p_font mb-0 text-muted">Latest Fleet</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition)->latest_fleet }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal-info">
                                                <p class="p_font mb-0 text-muted">Certificate</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition)->certificate_no }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal-info">
                                                <p class="p_font mb-0 text-muted">Country of Licence/Approval</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition->country)->name }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal-info">
                                                <p class="p_font mb-0 text-muted">Licence Number</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition)->licence_no }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal-info">
                                                <p class="p_font mb-0 text-muted">Latest Airframe</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition)->engineer_latest_airframe }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal-info">
                                                <p class="p_font mb-0 text-muted">Current Engine Type</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition)->engineer_current_engine_type }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Dispatcher Details  --}}
                            <div class="form_container">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>
                                            <strong>Dispatcher</strong>
                                            <a class="text-decoration-none text-dark" data-bs-toggle="modal"
                                                data-bs-target="#dispatcher"><i class="ri-pencil-line"></i></a>
                                        </span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="personal-info">
                                                <p class="p_font mb-0 text-muted">Preferred Location</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition)->preferred_location }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal-info">
                                                <p class="p_font mb-0 text-muted">Date of Last Flight</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition)->dispatcher_last_flight }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal-info">
                                                <p class="p_font mb-0 text-muted">Latest Fleet</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition)->latest_fleet }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="personal-info">
                                                <p class="p_font mb-0 text-muted">Dispatcher Approval</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition)->dispatcher_approval }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal-info">
                                                <p class="p_font mb-0 text-muted">Approval Authority</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition)->dispatcher_approval_authority }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal-info">
                                                <p class="p_font mb-0 text-muted">Certificate No</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition)->certificate_no }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal-info">
                                                <p class="p_font mb-0 text-muted">Licence Number</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition)->licence_no }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal-info">
                                                <p class="p_font mb-0 text-muted">Country of Licence/Approval</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition->country)->name }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="personal-info">
                                                <p class="p_font mb-0 text-muted">Licence Number</p>
                                                <p>
                                                    <strong class="text-muted p_font">
                                                        {{ optional($candidateDetail->jobPosition)->licence_no }}
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="col-12">
                                <form id="resumeUploadForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="upload-box">
                                        <label for="resume-upload" class="upload-label">
                                            <strong>Already have a resume?</strong>
                                            <a class="text-primary text-decoration-none">Upload resume</a>
                                        </label>
                                        <input type="file" id="resume-upload" name="candidate_resume"
                                            accept=".doc,.docx,.rtf,.pdf" />
                                        <div class="d-flex align-items-center gap-2 mt-2">
                                            <p id="file_name" class="mb-0">
                                                @if (optional($candidate)->candidate_resume)
                                                    {{ basename(optional($candidate)->candidate_resume) }}
                                                @endif
                                            </p>
                                            @if (optional($candidate)->candidate_resume)
                                                <a href="{{ asset('storage/' . optional($candidate)->candidate_resume) }}"
                                                    target="_blank" class="btn btn-sm btn-outline-primary"
                                                    title="View Resume">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                            @endif
                                        </div>
                                        <p>Supported Formats: doc, docx, rtf, pdf, up to 2 MB</p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!--- aviations  start-->
                    {{-- <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span>
                                    <strong>Aviation</strong>
                                    <a class="text-decoration-none text-dark" data-bs-toggle="modal"
                                        data-bs-target="#aviation"><i class="ri-pencil-line"></i></a>
                                </span>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="personal_info">
                                        <p class="p_font mb-0 text-muted">Licence/Certificate*</p>
                                        <p>
                                            <strong class="text-muted p_font">
                                                {{ optional($candidateDetail->jobPosition)->certificate_no }}
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="personal_info">
                                        <p class="p_font mb-0 text-muted">Licence Authority</p>
                                        <p>
                                            <strong class="text-muted p_font">
                                                {{ optional($candidateDetail->jobPosition)->certificate_no }}
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="personal_info">
                                        <p class="p_font mb-0 text-muted">Country of Licence/Approval</p>
                                        <p>
                                            <strong class="text-muted p_font">
                                                {{ optional($candidateDetail->jobPosition->country)->name }}
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="personal_info">
                                        <p class="p_font mb-0 text-muted">Licence Number</p>
                                        <p><strong
                                                class="text-muted p_font">{{ optional($candidateDetail->jobPosition)->licence_no }}</strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="personal_info">
                                        <p class="p_font mb-0 text-muted">Select Latest Fleet</p>
                                        <p>
                                            <strong class="text-muted p_font">
                                                {{ optional($candidateDetail->jobPosition)->latest_fleet }}
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="personal_info">
                                        <p class="p_font mb-0 text-muted">Select Latest Rank</p>
                                        <p><strong
                                                class="text-muted p_font">{{ optional($candidateDetail->jobPosition)->latest_rank }}</strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="personal_info">
                                        <p class="p_font mb-0 text-muted">Latest Airframe</p>
                                        <p><strong
                                                class="text-muted p_font">{{ optional($candidateDetail->jobPosition)->engineer_latest_airframe ?? 'N/A' }}</strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="personal_info">
                                        <p class="p_font mb-0 text-muted">Current Engine Type</p>
                                        <p><strong
                                                class="text-muted p_font">{{ optional($candidateDetail->jobPosition)->engineer_current_engine_type ?? 'N/A' }}</strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="personal_info">
                                        <p class="p_font mb-0 text-muted">Total Hours on Fleet in Rank</p>
                                        <p><strong
                                                class="text-muted p_font">{{ optional($candidateDetail->jobPosition)->total_hours_on_fleet ?? 'N/A' }}</strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="personal_info">
                                        <p class="p_font mb-0 text-muted">Select Valid Medical</p>
                                        <p>
                                            <strong class="text-muted p_font">
                                                @if (optional($candidateDetail->jobPosition)->valid_medical === 'Yes')
                                                    Yes
                                                @elseif (optional($candidateDetail->jobPosition)->valid_medical === 'No')
                                                    No
                                                @endif
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="personal_info">
                                        <p class="p_font mb-0 text-muted">Other Non-Flying Position</p>
                                        <p><strong
                                                class="text-muted p_font">{{ optional($candidateDetail->jobPosition)->non_flying_position }}</strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="personal_info">
                                        <p class="p_font mb-0 text-muted">Height</p>
                                        <p><strong
                                                class="text-muted p_font">{{ optional($candidateDetail->jobPosition)->cabin_crew_height ?? 'N/A' }}</strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="personal_info">
                                        <p class="p_font mb-0 text-muted">Weight</p>
                                        <p><strong
                                                class="text-muted p_font">{{ optional($candidateDetail->jobPosition)->cabin_crew_weight ?? 'N/A' }}</strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="personal_info">
                                        <p class="p_font mb-0 text-muted">Date Of Last Flight</p>
                                        <p><strong
                                                class="text-muted p_font">{{ optional($candidateDetail->jobPosition)->date_of_last_flight ?? 'N/A' }}</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!--- aviations  end-->

                    <!--- key and skills start-->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span>
                                    <strong>Key skills</strong>
                                    <a class="text-decoration-none text-dark" data-bs-toggle="modal"
                                        data-bs-target="#skill_add"><i class="ri-pencil-line"></i></a>
                                </span>
                                <a class="add_profile_details text-decoration-none" type="button" data-bs-toggle="modal"
                                    data-bs-target="#skill_add">Add skills</a>
                            </div>
                            <ul class="keySkillstype list-unstyled d-flex flex-wrap m-0">
                                @forelse ($skills as $skill)
                                    <li>{{ $skill }}</li>
                                @empty
                                    <li class="text-muted">No skills added yet.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <!--- key and skills end-->


                    <!--- IT skills start-->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span>
                                    <strong>IT skills</strong>
                                    {{-- <a class="text-decoration-none text-dark" data-bs-toggle="modal"
                                        data-bs-target="#it_skill_add"><i class="ri-pencil-line"></i></a> --}}
                                </span>
                                <a class="add_profile_details text-decoration-none" type="button" data-bs-toggle="modal"
                                    data-bs-target="#it_skill_add">Add IT skills</a>
                            </div>

                            <div class="table-responsive">
                                <table class="table skillTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Skills</th>
                                            <th scope="col">FiVersionrst</th>
                                            <th scope="col">Last used</th>
                                            <th scope="col">Experience Year</th>
                                            <th scope="col">Month</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($itskills as $itskill)
                                            <tr>
                                                <td>{{ $itskill->skill }}</td>
                                                <td>{{ $itskill->software_version }}</td>
                                                <td>{{ $itskill->last_used_software_year }}</td>
                                                <td>{{ $itskill->software_experience_year }}</td>
                                                <td>{{ $itskill->software_experience_month }}</td>
                                                <td>
                                                    <div class="d-flex gap-3">
                                                        <button class="edit-btn-itskill border-0 bg-transparent"
                                                            data-id="{{ $itskill->id }}"
                                                            data-skill={{ $itskill->skill }}
                                                            data-software_version="{{ $itskill->software_version }}"
                                                            data-last_used_software_year="{{ $itskill->last_used_software_year }}"
                                                            data-software_experience_year="{{ $itskill->software_experience_year }}"
                                                            data-software_experience_month="{{ $itskill->software_experience_month }}"
                                                            data-bs-toggle="modal" data-bs-target="#it_skill_edit">
                                                            <i class="ri-pencil-line"></i>
                                                        </button>

                                                        <button class="btn-delete-itskill border-0 bg-transparent"
                                                            data-id="{{ $itskill->id }}">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--- IT skills end-->

                    <!--- Employment  start-->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span>
                                    <strong>Employment</strong>
                                </span>
                                <a class="add_profile_details text-decoration-none" type="button" data-bs-toggle="modal"
                                    data-bs-target="#employment">Add Employment </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table skillTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Experience</th>
                                            <th scope="col">Expe. in Months</th>
                                            <th scope="col">Company Name</th>
                                            <th scope="col">Job Title</th>
                                            <th scope="col">Current Salary</th>
                                            <th scope="col">Notice Period</th>
                                            {{-- <th scope="col" class="text-center">Current Employment</th> --}}
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employments as $employment)
                                            <tr>
                                                <td>{{ $employment->experience }}</td>
                                                <td>{{ $employment->experience_month }}</td>
                                                <td>{{ $employment->company_name }}</td>
                                                <td>{{ $employment->job_title }}</td>
                                                <td>{{ $employment->current_salary }}</td>
                                                <td>{{ $employment->notice_period }}</td>
                                                {{-- <td>
                                                    @if ($employment->is_current_employment == '0')
                                                        {{ 'No' }}
                                                    @elseif ($employment->is_current_employment == '1')
                                                        {{ 'Yes' }}
                                                    @endif
                                                </td> --}}
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <button class="edit-btn-employment border-0 bg-transparent"
                                                            data-id="{{ $employment->id }}"
                                                            data-experience="{{ $employment->experience }}"
                                                            data-experience_month="{{ $employment->experience_month }}"
                                                            data-company_name="{{ $employment->company_name }}"
                                                            data-job_title="{{ $employment->job_title }}"
                                                            data-current_salary="{{ $employment->current_salary }}"
                                                            data-notice_period="{{ $employment->notice_period }}"
                                                            data-bs-toggle="modal" data-bs-target="#edit_employment">
                                                            <i class="ri-pencil-line"></i>
                                                        </button>


                                                        <button class="btn-delete-employment border-0 bg-transparent"
                                                            data-id="{{ $employment->id }}">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--- Employment  end-->

                    <!--- Education start-->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span>
                                    <strong>Education</strong>
                                </span>
                                <a class="add_profile_details text-decoration-none" type="button" data-bs-toggle="modal"
                                    data-bs-target="#education">Add Education</a>
                            </div>

                            <div class="table-responsive">
                                <table class="table skillTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Course</th>
                                            <th scope="col">University/Institute</th>
                                            <th scope="col">Course type</th>
                                            <th scope="col">Course duration From</th>
                                            <th scope="col" style="width: 150px;">Course duration To</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($educations as $education)
                                            <tr>
                                                <td>{{ $education->course }}</td>
                                                <td>{{ $education->university }}</td>
                                                <td>
                                                    @if ($education->course_type == 'full_time')
                                                        {{ 'Full Time' }}
                                                    @elseif ($education->course_type == 'part_time')
                                                        {{ 'Part Time' }}
                                                    @elseif ($education->course_type == 'distance')
                                                        {{ 'Correspondence/Distance learning' }}
                                                    @endif
                                                </td>
                                                <td>{{ $education->start_year }}</td>
                                                <td>{{ $education->end_year }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <button class="edit-btn-education border-0 bg-transparent"
                                                            data-id="{{ $education->id }}"
                                                            data-course="{{ $education->course }}"
                                                            data-university="{{ $education->university }}"
                                                            data-course_type="{{ $education->course_type }}"
                                                            data-start_year="{{ $education->start_year }}"
                                                            data-end_year="{{ $education->end_year }}"
                                                            data-bs-toggle="modal" data-bs-target="#edit_Education">
                                                            <i class="ri-pencil-line"></i>
                                                        </button>

                                                        <button class="btn-delete border-0 bg-transparent"
                                                            data-id="{{ $education->id }}">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--- Education end-->

                    <!--- Profile summary  start-->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span>
                                    <strong>Profile summary</strong>
                                    <a class="text-decoration-none text-dark" data-bs-toggle="modal"
                                        data-bs-target="#add_profile_summry"><i class="ri-pencil-line"></i></a>
                                </span>
                                {{-- <a class="add_profile_details text-decoration-none" type="button" data-bs-toggle="modal"
                                    data-bs-target="#profile_summry">Add Profile summary </a> --}}
                            </div>

                            <p style="font-size: 14px;">
                                {{ optional($candidate)->profile_summary }}
                            </p>

                        </div>
                    </div>
                    <!--- Profile summary  end-->

                    <!--- Personal details  start-->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span>
                                    <strong>Personal details</strong>
                                    <a class="text-decoration-none text-dark" data-bs-toggle="modal"
                                        data-bs-target="#edit_personal_details"><i class="ri-pencil-line"></i></a>
                                </span>
                                <a class="add_profile_details text-decoration-none" type="button" data-bs-toggle="modal"
                                    data-bs-target="#personal_details">Add Personal details</a>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="personal_info">
                                        <p class="p_font mb-0 text-muted">Marital Status</p>
                                        <p><strong
                                                class="text-muted p_font">{{ optional($candidate)->marital_status }}</strong>
                                        </p>
                                    </div>

                                    <div class="personal_info">
                                        <p class="p_font mb-0 text-muted">Pincode</p>
                                        <p><strong class="text-muted p_font">{{ optional($candidate)->pincode }}</strong>
                                        </p>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="personal_info">
                                        <p class="p_font mb-0 text-muted">Have you taken a career break?</p>
                                        <p><strong class="text-muted p_font">
                                                @if (optional($candidate)->career_break == 'Yes')
                                                    {{ 'Yes' }}
                                                @elseif (optional($candidate)->career_break == 'No')
                                                    {{ 'No' }}
                                                @endif
                                            </strong>
                                        </p>
                                    </div>
                                    <div class="personal_info">
                                        <p class="p_font mb-0 text-muted">Language proficiency</p>
                                        <p>
                                            <strong class="text-muted p_font">
                                                {{ implode(', ', optional($candidate)->language ?? []) }}
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="personal_info">
                                        <p class="p_font mb-0 text-muted">Date of birth</p>
                                        <p>
                                            <strong class="text-muted p_font">
                                                @if (optional($candidate)->date_of_birth)
                                                    {{ \Carbon\Carbon::parse($candidate->date_of_birth)->format('d/m/Y') }}
                                                @endif
                                            </strong>
                                        </p>
                                    </div>
                                    <div class="personal_info">
                                        <p class="p_font mb-0 text-muted">Hometown</p>
                                        <p><strong class="text-muted p_font">{{ optional($candidate)->hometown }}</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- Personal details  end-->

                </div>
            </div>
        </div>
    </section>
@endsection

@section('user_profile_modal')
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}'
            });
        </script>
    @endif

    <script>
        $('.select2').select2({
            dropdownParent: $('#skill_add'),
        });

        $('.select2').select2({
            dropdownParent: $('#personal_details'),
        });

        $('.skill-select').select2({
            dropdownParent: $('#skill_add')
        });

        $('.personal-select').select2({
            dropdownParent: $('#personal_details')
        });

        $(document).ready(function() {
            $('#delete_skill').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't to delete this skill!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your skill has been deleted.",
                            icon: "success"
                        });
                    }
                });
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#search_job').on('input', function() {
                let value = $(this).val();
                $(this).val(value.replace(/[^a-zA-Z0-9 ]/g, ''));
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#aviation_form').on('change', function() {
                let aviation_val = $(this).val();
                if (aviation_val === 'pilot') {
                    $('#pilot').modal('show');
                } else if (aviation_val === 'skilled_non_skilled') {
                    $('#skilled_non_skilled').modal('show');
                } else if (aviation_val === 'cabin_crew') {
                    $('#cabin_crew').modal('show');
                } else if (aviation_val === 'engineer') {
                    $('#engineer').modal('show');
                } else if (aviation_val === 'dispatcher') {
                    $('#dispatcher').modal('show');
                } else {
                    console.log(aviation_val)
                }
            });
        });
    </script>

    <script>
        $('.edit-btn-education').on('click', function() {
            const id = $(this).data('id');
            const course = $(this).data('course');
            const university = $(this).data('university');
            const courseType = $(this).data('course_type');
            const startYear = $(this).data('start_year');
            const endYear = $(this).data('end_year');
            $('#education_id').val(id);
            $('input[name="course"]').val(course);
            $('input[name="university"]').val(university);
            $('select[name="start_year"]').val(startYear);
            $('select[name="end_year"]').val(endYear);

            $('input[name="course_type"]').prop('checked', false);
            if (courseType === 'full_time') {
                $('#courseTypeFullTime').prop('checked', true);
            } else if (courseType === 'part_time') {
                $('#courseTypePartTime').prop('checked', true);
            } else if (courseType === 'distance') {
                $('#courseTypeDistance').prop('checked', true);
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#skill-add-form').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: "{{ route('frontend.update-skills') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        });
                        $('#skill_add').modal('hide');
                    },
                });
            });

            // Ajax
            // for Employment
            $('#add-employment-form').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('frontend.add-employment-details') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        }).then(() => {
                            $('#employment').modal('hide');
                            location.reload();
                        });
                    },
                });
            });

            $('.edit-btn-employment').on('click', function() {
                const button = $(this);

                $('#employment_id').val(button.data('id'));
                $('select[name="experience"]').val(button.data('experience'));
                $('select[name="experience_month"]').val(button.data('experience_month'));
                $('input[name="company_name"]').val(button.data('company_name'));
                $('input[name="job_title"]').val(button.data('job_title'));
                $('input[name="current_salary"]').val(button.data('current_salary'));
                $('select[name="notice_period"]').val(button.data('notice_period'));
            });


            $('#edit-employment-form').on('submit', function(e) {
                e.preventDefault();

                const form = $(this);
                const id = $('#employment_id').val();
                const formData = form.serialize();

                $.ajax({
                    url: `/update-employment-details/${id}`,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.status) {
                            $('#edit_employment').modal('hide');
                            Swal.fire('Success', response.message, 'success').then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire('Error', response.message, 'error');
                        }
                    },
                    error: function(xhr) {
                        let errorMsg = 'Something went wrong';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMsg = xhr.responseJSON.message;
                        }
                        Swal.fire('Error', errorMsg, 'error');
                    }
                });
            });

            $('.btn-delete-employment').on('click', function(e) {
                e.preventDefault();
                const id = $(this).data('id');
                const token = $('meta[name="csrf-token"]').attr('content');
                const row = $(this).closest('tr');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This will permanently delete the Employment detail.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/delete-employment/${id}`,
                            type: 'DELETE',
                            data: {
                                _token: token
                            },
                            success: function(response) {
                                if (response.status) {
                                    Swal.fire('Deleted!', response.message, 'success')
                                        .then(() => {
                                            row.fadeOut(300, function() {
                                                $(this).remove();
                                            });
                                        });
                                } else {
                                    Swal.fire('Error!', response.message ||
                                        'Failed to delete education.', 'error');
                                }
                            },
                            error: function(xhr) {
                                Swal.fire('Error!', xhr.responseJSON?.message ||
                                    'Something went wrong.', 'error');
                            }
                        });
                    }
                });
            });

            // $('#itskill-add-form').on('submit', function(e) {
            //     e.preventDefault();
            //     let formData = new FormData(this);

            //     $.ajax({
            //         url: "{{ route('frontend.add-itskill') }}",
            //         type: "POST",
            //         data: formData,
            //         processData: false,
            //         contentType: false,
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
            //                 'content')
            //         },
            //         success: function(response) {
            //             Swal.fire({
            //                 icon: 'success',
            //                 title: 'Success',
            //                 text: response.message,
            //             }).then(() => {
            //                 $('#it_skill_add').modal('hide');
            //                 location.reload();
            //             });
            //         },
            //     });
            // });

            $('#add-profile-summary').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: "{{ route('frontend.add-profile-summary') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        }).then(() => {
                            $('#profile_summry').modal('hide');
                            location.reload();
                        });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong!',
                        });
                    }
                });
            });

            $('#add-education-form').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: "{{ route('frontend.add-education-details') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        }).then(() => {
                            $('#education').modal('hide');
                            location.reload();
                        });
                    },
                    error: function(e) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong!',
                        });
                    }
                });
            });

            $('.btn-delete').on('click', function(e) {
                e.preventDefault();
                const id = $(this).data('id');
                const token = $('meta[name="csrf-token"]').attr('content');
                const row = $(this).closest('tr');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This will permanently delete the education detail.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/delete-education/${id}`,
                            type: 'DELETE',
                            data: {
                                _token: token
                            },
                            success: function(response) {
                                if (response.status) {
                                    Swal.fire('Deleted!', response.message, 'success')
                                        .then(() => {
                                            row.fadeOut(300, function() {
                                                $(this).remove();
                                            });
                                        });
                                } else {
                                    Swal.fire('Error!', response.message ||
                                        'Failed to delete education.', 'error');
                                }
                            },
                            error: function(xhr) {
                                Swal.fire('Error!', xhr.responseJSON?.message ||
                                    'Something went wrong.', 'error');
                            }
                        });
                    }
                });
            });

            $('.edit-btn-education').on('click', function() {
                const button = $(this);
                $('#education_id').val(button.data('id'));
                $('input[name="course"]').val(button.data('course'));
                $('input[name="university"]').val(button.data('university'));

                const courseType = button.data('course_type');
                $(`input[name="course_type"][value="${courseType}"]`).prop('checked', true);

                $('select[name="start_year"]').val(button.data('start_year'));
                $('select[name="end_year"]').val(button.data('end_year'));
            });

            $('#edit-education-form').on('submit', function(e) {
                e.preventDefault();

                const form = $(this);
                const id = $('#education_id').val();
                const formData = form.serialize();

                $.ajax({
                    url: `/update-education-details/${id}`,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.status) {
                            $('#edit_Education').modal('hide');
                            Swal.fire('Success', response.message, 'success').then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire('Error', response.message, 'error');
                        }
                    },
                    error: function(xhr) {
                        let errorMsg = 'Something went wrong';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMsg = xhr.responseJSON.message;
                        }
                        Swal.fire('Error', errorMsg, 'error');
                    }
                });
            });

            // Ajax code for IT Skills
            $('#itskill-add-form').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: "{{ route('frontend.add-it-skills') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        }).then(() => {
                            $('#it_skill_add').modal('hide');
                            location.reload();
                        });
                    },
                    error: function(e) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong!',
                        });
                    }
                });
            });

            $('.btn-delete-itskill').on('click', function(e) {
                e.preventDefault();
                const id = $(this).data('id');
                const token = $('meta[name="csrf-token"]').attr('content');
                const row = $(this).closest('tr');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Are you sure you want to delete your IT skill details?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/delete-itskill/${id}`,
                            type: 'DELETE',
                            data: {
                                _token: token
                            },
                            success: function(response) {
                                if (response.status) {
                                    Swal.fire('Deleted!', response.message, 'success')
                                        .then(() => {
                                            row.fadeOut(300, function() {
                                                $(this).remove();
                                            });
                                        });
                                } else {
                                    Swal.fire('Error!', response.message ||
                                        'Failed to delete education.', 'error');
                                }
                            },
                            error: function(xhr) {
                                Swal.fire('Error!', xhr.responseJSON?.message ||
                                    'Something went wrong.', 'error');
                            }
                        });
                    }
                });
            });

            $('.edit-btn-itskill').on('click', function() {
                const button = $(this);
                $('#itskill_id').val(button.data('id'));
                $('input[name="skill"]').val(button.data('skill'));
                $('input[name="software_version"]').val(button.data('software_version'));
                $('select[name="last_used_software_year"]').val(button.data('last_used_software_year'));
                $('select[name="software_experience_year"]').val(button.data('software_experience_year'));
                $('select[name="software_experience_month"]').val(button.data('software_experience_month'));
            });

            $('#edit-itskill-form').on('submit', function(e) {
                e.preventDefault();

                const form = $(this);
                const id = $('#itskill_id').val();
                const formData = form.serialize();

                $.ajax({
                    url: `/update-itskill-details/${id}`,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.status) {
                            $('#it_skill_edit').modal('hide');
                            Swal.fire('Success', response.message, 'success').then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire('Error', response.message, 'error');
                        }
                    },
                    error: function(xhr) {
                        let errorMsg = 'Something went wrong';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMsg = xhr.responseJSON.message;
                        }
                        Swal.fire('Error', errorMsg, 'error');
                    }
                });
            });

            // Ajax for Personal Details
            $('#add-personal-details').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: "{{ route('frontend.add-personal-details') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        }).then(() => {
                            $('#personal_details').modal('hide');
                            location.reload();
                        });
                    },
                    error: function(e) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong!',
                        });
                    }
                });
            });

            $('#edit-personal-details').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('frontend.update-personal-details') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        }).then(() => {
                            $('#edit_personal_details').modal('hide');
                            location.reload();
                        });
                    },
                });
            });

            $('#edit-profile-summary').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('frontend.update-user-profile-details') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        }).then(() => {
                            $('#add_profile_summry').modal('hide');
                            location.reload();
                        });
                    },
                });
            });

            $('#add-pilot-details').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: "{{ route('frontend.add-pilot') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        }).then(() => {
                            $('#pilot').modal('hide');
                            location.reload();
                        });
                    },
                    error: function(e) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong!',
                        });
                    }
                });
            });

            $('#add-skilled-details').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('frontend.add-skill') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        }).then(() => {
                            $('#skilled_non_skilled').modal('hide');
                            location.reload();
                        });
                    },
                    error: function(e) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong!',
                        });
                    }
                });
            });

            $('#add-cabin-crew-details').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('frontend.add-cabin-crew') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        }).then(() => {
                            $('#cabin_crew').modal('hide');
                            location.reload();
                        });
                    },
                    error: function(e) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong!',
                        });
                    }
                });
            });

            $('#add-engineer-details').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('frontend.addEngineer') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        }).then(() => {
                            $('#cabin_crew').modal('hide');
                            location.reload();
                        });
                    },
                    error: function(e) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong!',
                        });
                    }
                });
            });


            $('#add-dispatcher-details').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('frontend.add-dispatcher') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        }).then(() => {
                            $('#dispatcher').modal('hide');
                            location.reload();
                        });
                    },
                    error: function(e) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong!',
                        });
                    }
                });
            });
        });
    </script>
@endsection
