@extends('layouts.backend.main')
@section('main-section')
    <div class="page-wrapper">
        <div class="page-titles">
            <div class="row">
                <div class="col-8 align-self-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-flex align-items-center">
                            <li class="breadcrumb-item">
                                <a href="{{ route('backend.jobs.index') }}" class="link"><i
                                        class="ri-home-3-line fs-5"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Job
                            </li>
                        </ol>
                        <h3 class="mb-0 fw-bold">Edit Job</h3>
                    </nav>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-end">
                    <a href="javascript:void(0)" onclick="history.back();"
                        class="btn btn-sm d-flex align-items-center ms-3 addButton">
                        <i class="ri-arrow-go-back-line"></i> Back
                    </a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form id="job_submit_form" action="{{ route('backend.jobs.update', encrypt($job->id)) }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card borderRadius">
                            <div class="card-body p-3">
                                <div class="row formselector">
                                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark"> Company Name <span class="text-danger">
                                                    *</span></label>
                                            <select class="form-control selectForm select_searchBox" name="company_name"
                                                id="select2-with-Compnay" style="width: 100%;">
                                                <option selected>Select Company Name</option>
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}"
                                                        {{ old('company_name', $job->company_id) == $company->id ? 'selected' : '' }}>
                                                        {{ $company->company_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('company_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="job_title">Job Title <span class="text-danger">
                                                    *</span></label>
                                            <input type="text" placeholder="Job Title" name="job_title"
                                                value="{{ old('job_title', $job->job_title) }}"
                                                class="form-control typeText" required>
                                        </div>
                                        @error('job_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Job Type <span class="text-danger">*</span></label>
                                            <div class="d-flex flex-row gap-4 align-items-center ">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="job_type"
                                                        {{ old('job_type', $job->job_type) == 'Aviation' ? 'checked' : '' }}
                                                        id="aviation" value="Aviation">
                                                    <label class="form-check-label" for="aviation">
                                                        Aviation
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="job_type"
                                                        {{ old('job_type', $job->job_type) == 'Non-Aviation' ? 'checked' : '' }}
                                                        id="non_aviation" value="Non-Aviation">
                                                    <label class="form-check-label" for="non_aviation">
                                                        Non-Aviation
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('job_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Job Category <span class="text-danger">
                                                    *</span></label>
                                            <select class="form-control selectForm select_searchBox" name="job_category"
                                                id="select2-with-jobCategory" style="width: 100%;">
                                                <option selected>Select Job Category </option>
                                            </select>
                                            @error('job_category')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-4">
                                        <div class="form-group ">
                                            <label class="text-dark">Job Skill</label>
                                            @php
                                                $jobSkills = old('job_skills', $job->job_skills);

                                                if (is_string($jobSkills) && str_contains($jobSkills, '[')) {
                                                    $jobSkills = json_decode($jobSkills, true);
                                                }

                                                if (!is_array($jobSkills)) {
                                                    $jobSkills = [$jobSkills];
                                                }

                                                $jobSkillsString = implode(',', array_filter($jobSkills));
                                            @endphp

                                            <input type="text" placeholder="Job Skills" name="job_skills"
                                                value="{{ $jobSkillsString }}" class="form-control typeText" required>

                                        </div>
                                        @error('job_skills')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Gender <span class="text-danger"> *</span></label>
                                            <div class="d-flex flex-row gap-4 align-items-center ">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        {{ old('gender', $job->gender) == 'Male' ? 'checked' : '' }}
                                                        id="Male" value="Male">
                                                    <label class="form-check-label" for="Male">
                                                        Male
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="Female" value="Female"
                                                        {{ old('gender', $job->gender) == 'Female' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="Female">
                                                        Female
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        {{ old('gender', $job->gender) == 'Both' ? 'checked' : '' }}
                                                        id="Both" value="Both">
                                                    <label class="form-check-label" for="Both">
                                                        Both
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-4">
                                        <div class="form-group select2form">
                                            <label class="text-dark ">Languages</label>
                                            <select class="select2 form-control block" id="select2-with-language"
                                                multiple="multiple" name="languages[]" style="width: 100%">
                                                @php
                                                    $selectedLanguages = old(
                                                        'languages',
                                                        isset($job) ? $job->languages : [],
                                                    );

                                                    if (!is_array($selectedLanguages)) {
                                                        $selectedLanguages = [$selectedLanguages];
                                                    }
                                                @endphp

                                                @foreach ($languages as $language)
                                                    <option value="{{ $language->id }}"
                                                        {{ in_array($language->id, $selectedLanguages ?? []) ? 'selected' : '' }}>
                                                        {{ $language->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('language[]')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Job Expiry Date <span class="text-danger">
                                                    *</span></label>
                                            <input type="date" placeholder="Job Expiry Date" name="job_expiry"
                                                value="{{ old('job_expiry', isset($job->job_expiry) ? \Carbon\Carbon::parse($job->job_expiry)->toDateString() : now()->toDateString()) }}"
                                                min="{{ now()->toDateString() }}" class="form-control typeDate" required>
                                        </div>
                                        @error('job_expiry')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Salary From <span class="text-danger">
                                                    *</span></label>
                                            <input type="number" placeholder="Salary From typeNumber" name="salary_from"
                                                value="{{ old('salary_from', $job->salary_from) }}" class="form-control"
                                                required>
                                        </div>
                                        @error('salary_from')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Salary To <span class="text-danger"> *</span></label>
                                            <input type="number" placeholder="Salary To" name="salary_to"
                                                value="{{ old('salary_to', $job->salary_to) }}"
                                                class="form-control typeNumber" required>
                                        </div>
                                        @error('salary_to')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Country <span class="text-danger"> *</span></label>
                                            <select class="form-control selectForm select_searchBox" name="country_id"
                                                id="select2-with-Country" style="width: 100%;">
                                                <option selected>Select Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                                        {{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">State <span class="text-danger"> *</span></label>
                                            <select class="form-control selectForm select_searchBox" name="state_id"
                                                id="select2-with-State" style="width: 100%;">
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-4">
                                        <div class="form-group select2form">
                                            <label class="text-dark ">City</label>
                                            <select class="select2 form-control block" id="select2-with-City"
                                                name="cities" multiple="multiple" style="width: 100%">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Currency<span class="text-danger"> *</span></label>
                                            <input class="form-control typeText" name="currency"
                                                value="{{ old('currency', $job->currency) }}" id="currency" readonly
                                                type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="title">Job Experience:<span
                                                    class="text-danger">
                                                    *</span></label>
                                            <input class="form-control yearExp" placeholder="Job Experience:"
                                                value="{{ old('min_experience', $job->min_experience) }}"
                                                name="min_experience" required type="number">
                                        </div>
                                        @error('min_experience')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Work Shift Type <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control selectForm select_searchBox" name="shift"
                                                style="width: 100%;">
                                                <option value="Morning Shift"
                                                    {{ old('shift', $job->shift) == 'Morning Shift' ? 'selected' : '' }}>
                                                    Morning Shift
                                                </option>
                                                <option value="Evening Shift"
                                                    {{ old('shift', $job->shift) == 'Evening Shift' ? 'selected' : '' }}>
                                                    Evening Shift
                                                </option>
                                                <option value="Night Shift"
                                                    {{ old('shift', $job->shift) == 'Night Shift' ? 'selected' : '' }}>Night
                                                    Shift
                                                </option>
                                                <option value="Full-Time"
                                                    {{ old('shift', $job->shift) == 'Full-Time' ? 'selected' : '' }}>
                                                    Full-Time</option>
                                                <option value="Part-Time"
                                                    {{ old('shift', $job->shift) == 'Part-Time' ? 'selected' : '' }}>
                                                    Part-Time</option>
                                                <option value="Rotational Shifts"
                                                    {{ old('shift', $job->shift) == 'Rotational Shifts' ? 'selected' : '' }}>
                                                    Rotational
                                                    Shifts</option>
                                                <option value="Standby / On-Call"
                                                    {{ old('shift', $job->shift) == 'Standby / On-Call' ? 'selected' : '' }}>
                                                    Standby /
                                                    On-Call</option>
                                            </select>
                                        </div>
                                        @error('shift')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label class="text-dark">Position <span class="text-danger"> *</span></label>
                                            <input type="text" placeholder="Position" name="position"
                                                value="{{ old('position', $job->position) }}"
                                                class="form-control typeText" required>
                                        </div>
                                        @error('position')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-4">
                                            <div class="form-group">
                                                <label class="text-dark">Description: <span class="text-danger">
                                                        *</span></label>
                                                <textarea id="editor" name="jd">{{ old('jd', $job->jd) }}</textarea>
                                            </div>
                                            @error('jd')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-dark" for="title">Hide Salary </label>
                                                    <div class="input-group">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" value="0"
                                                                type="checkbox" role="switch" id="hide_salary"
                                                                name="hide_salary"
                                                                {{ old('hide_salary', $job->hide_salary) ? 'checked' : '' }}
                                                                style="width: 40px;">
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('hide_salary')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-dark" for="title">Hide Company </label>
                                                    <div class="input-group">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" value="0"
                                                                type="checkbox" role="switch" name="hide_company"
                                                                {{ old('hide_company', $job->hide_company) ? 'checked' : '' }}
                                                                style="width: 40px;">
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('hide_company')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="submitBtn mt-5 d-flex justify-content-end gap-3">
                                    <button type="submit" onsubmit="submitForm()"
                                        class="btn btnBg text-white">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@section('javascript-section')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $('#select2-with-Compnay, #select2-with-Industry, #select2-with-jobCategory, #select2-with-language, #select2-with-Country, #select2-with-State, #select2-with-City')
                .select2({
                    allowClear: true
                });
        })

        let editorInstance;

        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                editorInstance = editor;
            })
            .catch(error => {
                console.error(error);
            });

        function submitForm() {
            if (editorInstance) {
                document.querySelector('#editor').value = editorInstance.getData();
                document.querySelector('form').submit();
            } else {
                alert("Editor is not ready yet. Please wait a moment.");
            }
        }
    </script>
    <script>
        let aviationAreas = @json($aviationAreas);
        let nonAviationAreas = @json($nonAviationAreas);

        let selectedJobCategory = @json(old('job_category', $job->job_category ?? null));
        let currentJobType = @json(old('job_type', $job->job_type ?? ''));

        function updateJobCategory(list, selectedId = null) {
            let select = document.getElementById('select2-with-jobCategory');
            select.innerHTML = '<option value="">Select Job Category</option>';

            list.forEach(area => {
                let isSelected = selectedId == area.id ? 'selected' : '';
                select.innerHTML += `<option value="${area.id}" ${isSelected}>${area.name}</option>`;
            });
        }

        document.querySelectorAll('input[name="job_type"]').forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'Aviation') {
                    updateJobCategory(aviationAreas);
                } else {
                    updateJobCategory(nonAviationAreas);
                }
            });
        });

        if (currentJobType === 'Aviation') {
            updateJobCategory(aviationAreas, selectedJobCategory);
        } else if (currentJobType === 'Non-Aviation') {
            updateJobCategory(nonAviationAreas, selectedJobCategory);
        }
    </script>
    <script>
        $(document).ready(function() {
            let oldCountry = '{{ old('country', $job->country_id ?? '') }}';
            let oldState = '{{ old('state', $job->state_id ?? '') }}';
            let oldCity = '{{ old('city', $job->city_id ?? '') }}';

            // When Country changes → Load States
            function loadStates(country_id, callback) {
                $('#select2-with-State').html('<option value="">Loading...</option>');
                $('#select2-with-City').html('<option value="">Select City</option>');

                if (country_id) {
                    $.ajax({
                        url: '/get-states/' + country_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#select2-with-State').empty().append(
                                '<option value="">Select State</option>');
                            $.each(data, function(_, value) {
                                let isSelected = (value.id == oldState) ? 'selected' : '';
                                $('#select2-with-State').append('<option value="' + value.id +
                                    '" ' + isSelected + '>' + value.name + '</option>');
                            });
                            if (callback) callback();
                        }
                    });
                }
            }

            function loadCities(state_id) {
                $('#select2-with-City').html('<option value="">Loading...</option>');

                if (state_id) {
                    $.ajax({
                        url: '/get-cities/' + state_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#select2-with-City').empty().append(
                                '<option value="">Select City</option>');
                            $.each(data, function(_, value) {
                                let isSelected = (value.id == oldCity) ? 'selected' : '';
                                $('#select2-with-City').append('<option value="' + value.id +
                                    '" ' + isSelected + '>' + value.name + '</option>');
                            });
                        }
                    });
                }
            }

            // On country change
            $('#select2-with-Country').on('change', function() {
                let country_id = $(this).val();
                loadStates(country_id);

                // Get currency
                if (country_id) {
                    $.ajax({
                        url: '/api/get-currency/' + country_id,
                        type: 'GET',
                        success: function(response) {
                            if (response.currency) {
                                $('#currency').val(response.currency);
                            } else {
                                alert('No currency found for this country.');
                            }
                        },
                        error: function() {
                            alert('Error fetching currency.');
                        }
                    });
                }
            });

            // On state change
            $('#select2-with-State').on('change', function() {
                let state_id = $(this).val();
                loadCities(state_id);
            });

            // -------- Preload old data --------
            if (oldCountry) {
                $('#select2-with-Country').val(oldCountry).trigger('change');

                // Load states, then cities
                loadStates(oldCountry, function() {
                    if (oldState) {
                        $('#select2-with-State').val(oldState).trigger('change');
                        loadCities(oldState);
                    }
                });
            }

        });
    </script>
@endsection
@endsection
