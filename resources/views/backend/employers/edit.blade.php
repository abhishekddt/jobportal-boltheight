@extends('layouts.backend.main')
@section('main-section')
    <div class="page-wrapper">
        <div class="page-titles">
            <div class="row ">
                <div class="col-8 align-self-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-flex align-items-center">
                            <li class="breadcrumb-item">
                                <a href="{{ route('backend.dashboard') }}" class="link"><i
                                        class="ri-home-3-line fs-5"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Employers
                            </li>
                        </ol>
                        <h3 class="mb-0 fw-bold">Edit Employers</h3>
                    </nav>
                </div>
                <div class="col-4 d-flex align-items-center justify-content-end">
                    <a href="javascript:void(0)" onclick="history.back()"
                        class="btn btn-sm d-flex align-items-center ms-3 addButton">
                        <i class="ri-arrow-go-back-line"></i> Back
                    </a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row formselector">
                <div class="col-12">
                    <form action="{{ route('backend.employer.update', Crypt::encrypt($employer->id)) }}" method="POST"
                        autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card borderRadius">
                            <div class="card-body p-3">
                                <div class="row formselector">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark">Employer Name <span class="text-danger">
                                                    *</span></label>
                                            <input type="text" placeholder="Employer Name" class="form-control typeText"
                                                name="emp_name" value="{{ old('emp_name', $employer->user->name) }}"
                                                required>
                                            @error('emp_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark">Email<span class="text-danger"> *</span></label>
                                            <input type="email" placeholder="Email" name="emp_email" class="form-control"
                                                value="{{ old('emp_email', $employer->user->email) }}" required>
                                            @error('emp_email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark">Phone<span class="text-danger"> *</span></label>
                                            <input type="number" placeholder="Phone Number" name="emp_phone"
                                                class="form-control typeNumber"
                                                value="{{ old('emp_phone', $employer->user->phone) }}" required>
                                            @error('emp_phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark">CEO Name <span class="text-danger"> *</span></label>
                                            <input type="text" placeholder="CEO Name" name="emp_ceo"
                                                class="form-control typeText" name="emp_ceo"
                                                value="{{ old('emp_ceo', $employer->ceo_name) }}" required>
                                            @error('emp_ceo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark">Company Name <span class="text-danger">
                                                    *</span></label>
                                            <input type="text" placeholder="Company Name" name="emp_company"
                                                class="form-control typeText"
                                                value="{{ old('emp_company', $employer->company_name) }}" required>
                                            @error('emp_company')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark">Industry <span class="text-danger"> *</span></label>
                                            <select class="form-control selectForm" id="select2-with-Industry"
                                                name="industry" style="width: 100%;">
                                                @foreach ($industries as $industry)
                                                    <option value="{{ $industry->id }}"
                                                        {{ old('industry', $employer->industry_id) == $industry->id ? 'selected' : '' }}>
                                                        {{ $industry->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('industry')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark">Functional Area<span class="text-danger">
                                                    *</span></label>
                                            <select class="form-control selectForm" id="select2-with-FunctionalArea"
                                                name="functional_area" style="width: 100%;">
                                                <option value="">Select Functional Area</option>
                                                @foreach ($areas as $area)
                                                    <option value="{{ $area->id }}"
                                                        {{ old('functional_area', $employer->functional_area_id) == $area->id ? 'selected' : '' }}>
                                                        {{ $area->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('functional_area')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark">Ownership Type <span class="text-danger">
                                                    *</span></label>
                                            <select class="form-control selectForm" id="select2-with-Ownership"
                                                name="ownership_type" style="width: 100%;">
                                                <option selected disabled>Select Ownership Type</option>

                                                <option value="Sole Proprietorship"
                                                    {{ old('ownership_type', $employer->ownership_type) == 'Sole Proprietorship' ? 'selected' : '' }}>
                                                    Sole Proprietorship
                                                </option>

                                                <option value="Partnership"
                                                    {{ old('ownership_type', $employer->ownership_type) == 'Partnership' ? 'selected' : '' }}>
                                                    Partnership
                                                </option>

                                                <option value="Limited Liability Company"
                                                    {{ old('ownership_type', $employer->ownership_type) == 'Limited Liability Company' ? 'selected' : '' }}>
                                                    Limited Liability Company
                                                </option>

                                                <option value="Cooperative"
                                                    {{ old('ownership_type', $employer->ownership_type) == 'Cooperative' ? 'selected' : '' }}>
                                                    Cooperative
                                                </option>

                                                <option value="Joint Venture"
                                                    {{ old('ownership_type', $employer->ownership_type) == 'Joint Venture' ? 'selected' : '' }}>
                                                    Joint Venture
                                                </option>
                                            </select>
                                            @error('ownership_type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark">Country <span class="text-danger"> *</span></label>
                                            <select class="form-control selectForm" name="country"
                                                id="select2-with-Country" style="width: 100%;" name="country">
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ old('country', $employer->user->country_id) == $country->id ? 'selected' : '' }}>
                                                        {{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('country')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark">State <span class="text-danger"> *</span></label>
                                            <select class="form-control selectForm" id="select2-with-State"
                                                name="state" style="width: 100%;">
                                                <option value="">Select State</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}"
                                                        {{ old('state', $employer->user->state_id) == $state->id ? 'selected' : '' }}>
                                                        {{ $state->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('state')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark">City <span class="text-danger"> *</span></label>
                                            <select class="form-control selectForm" id="select2-with-City" name="city"
                                                style="width: 100%;">
                                                <option value="">Select City</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}"
                                                        {{ old('city', $employer->user->city_id) == $city->id ? 'selected' : '' }}>
                                                        {{ $city->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('city')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark">Size <span class="text-danger"> *</span></label>
                                            <select class="form-control selectForm" id="select2-with-Size"
                                                name="company_size" style="width: 100%;" required>
                                                <option selected value="">Select Size</option>
                                                <option value="1 - 10"
                                                    {{ old('company_size', $employer->company_size) == '1 - 10' ? 'selected' : '' }}>
                                                    1 - 10</option>
                                                <option value="10 - 50"
                                                    {{ old('company_size', $employer->company_size) == '10 - 50' ? 'selected' : '' }}>
                                                    10 - 50
                                                </option>
                                                <option value="50 - 100"
                                                    {{ old('company_size', $employer->company_size) == '50 - 100' ? 'selected' : '' }}>
                                                    50 - 100
                                                </option>
                                                <option value="100+"
                                                    {{ old('company_size', $employer->company_size) == '100+' ? 'selected' : '' }}>
                                                    100+</option>
                                            </select>
                                            @error('company_size')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark">Established Year <span class="text-danger">
                                                    *</span></label>
                                            <select class="form-control selectForm" id="select2-with-Established_year"
                                                name="established_year" style="width: 100%;" required>
                                                <option value="" disabled>Select Year</option>
                                                @for ($year = date('Y'); $year >= 1900; $year--)
                                                    <option value="{{ $year }}"
                                                        {{ old('established_year', $employer->established_year) == $year ? 'selected' : '' }}>
                                                        {{ $year }}
                                                    </option>
                                                @endfor
                                            </select>
                                            @error('established_year')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark">Location <span class="text-danger"> *</span></label>
                                            <input type="text" placeholder="Location" class="form-control"
                                                name="location" value="{{ old('location', $employer->location) }}"
                                                required>
                                            @error('location')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark">2nd Office Location </label>
                                            <input type="text" placeholder="2nd Office Location" class="form-control"
                                                name="second_office_location"
                                                value="{{ old('second_office_location', $employer->second_office_location) }}">
                                            @error('second_office_location')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark">Employer Details <span class="text-danger">
                                                    *</span></label>
                                            <textarea id="editor" required name="employer_detail">{{ old('employer_detail', $employer->employer_detail) }}</textarea>
                                            @error('employer_detail')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark">Website </label>
                                            <input type="text" placeholder="Website" class="form-control"
                                                value="{{ old('website', $employer->website) }}" name="website">
                                            @error('website')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark" for="title">Facebook URL</label>
                                            <div class="input-group">
                                                <span class="input-grouptext"><i class="ri-facebook-line"></i></span>
                                                <input class="form-control " placeholder="https://www.facebook.com/"
                                                    value="{{ old('facebook', $employer->facebook_url) }}" name="facbook"
                                                    type="text">
                                                @error('facbook')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark" for="title">Linkedin URL<span
                                                    class="text-danger">
                                                    *</span></label>
                                            <div class="input-group">
                                                <span class="input-grouptext"><i class="ri-linkedin-line"></i></span>
                                                <input class="form-control " placeholder="https://in.linkedin.com/"
                                                    name="linkedin" value="{{ old('linkedin', $employer->linkedin_url) }}"
                                                    type="text">

                                            </div>
                                            @error('linkdin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark" for="title">Status </label>
                                            <div class="input-group">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input toggle_employer_status" type="checkbox"
                                                        role="switch" data-encrypted-id="{{ encrypt($employer->id) }}"
                                                        {{ $employer->status ? 'checked' : '' }} style="width: 40px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submitBtn mt-5 d-flex justify-content-end gap-3">
                                    <button type="submit" onclick="submitForm()"
                                        class="btn btnBg text-white">Submit</button>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $('#select2-with-Industry, #select2-with-Ownership, #select2-with-Country, #select2-with-State, #select2-with-City, #select2-with-Size, #select2-with-Established_year, #select2-with-FunctionalArea')
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
        $(document).ready(function() {
            let oldState = '{{ old('
                state ') }}';
            let oldCity = '{{ old('
                city ') }}';
            let oldFunctionalArea = '{{ old('
                functional_area ') }}';
            // When Country changes → Load States
            $('#select2-with-Country').on('change', function() {
                var country_id = $(this).val();
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
                            $.each(data, function(key, value) {
                                let isSelected = (value.id == oldState) ? 'selected' :
                                    '';
                                $('#select2-with-State').append('<option value="' +
                                    value
                                    .id + '" ' + isSelected + '>' + value.name +
                                    '</option>');
                            });
                        }
                    });
                }
            });

            // When State changes → Load Cities
            $('#select2-with-State').on('change', function() {
                var state_id = $(this).val();
                $('#select2-with-City').html('<option value="">Loading...</option>');

                if (state_id) {
                    $.ajax({
                        url: '/get-cities/' + state_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#select2-with-City').empty().append(
                                '<option value="">Select City</option>');
                            $.each(data, function(key, value) {
                                let isSelected = (value.id == oldCity) ? 'selected' :
                                '';
                                $('#select2-with-City').append('<option value="' + value
                                    .id + '" ' + isSelected + '>' + value.name +
                                    '</option>');
                            });
                        }
                    });
                }
            });

            // get the funcational area by industry

            $('#select2-with-Industry').on('change', function() {
                var industry_id = $(this).val();
                $('#select2-with-FunctionalArea').html('<option value="">Loading...</option>');

                if (industry_id) {
                    $.ajax({
                        url: '/api/get-functional-areas/' + industry_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            let options = '<option value="">Select Functional Area</option>';

                            // Access the `data` inside the response (data.data)
                            $.each(data.data, function(index, item) {
                                let isSelected = (item.id == oldFunctionalArea) ?
                                    'selected' : '';
                                options += '<option value="' + item.id + '" ' +
                                    isSelected +
                                    '>' + item.name + '</option>';
                            });

                            $('#select2-with-FunctionalArea').html(options).trigger('change');
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', error);
                            $('#select2-with-FunctionalArea').html(
                                '<option value="">Error loading options</option>');
                        }
                    });

                }
            });

        });

        document.querySelectorAll('.toggle_employer_status').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                let encryptedId = this.dataset.encryptedId;
                let originalState = !this.checked; // store original state

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to change this employer's status.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/admin/employer/toggle-status/${encryptedId}`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute('content'),
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({}) // can be empty
                            })
                            .then(res => res.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire(
                                        'Updated!',
                                        'Employer status has been updated.',
                                        'success'
                                    );
                                } else {
                                    Swal.fire('Error', data.message ||
                                        'Failed to update status.',
                                        'error');
                                    checkbox.checked = originalState; // revert
                                }
                            })
                            .catch(() => {
                                Swal.fire('Error', 'Server error.', 'error');
                                checkbox.checked = originalState; // revert
                            });
                    } else {
                        checkbox.checked = originalState; // revert if cancelled
                    }
                });
            });
        });
    </script>

    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('
                    success ') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('
                    error ') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Validation Error!',
                html: '{!! implode('<br>', $errors->all()) !!}',
                confirmButtonText: 'OK'
            });
        @endif
    </script>
@endsection
@endsection
