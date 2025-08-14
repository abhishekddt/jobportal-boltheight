@extends('layouts.backend.main')
@section('main-section')
    <div class="page-wrapper">
        <div class="page-titles " style="padding-bottom: 0px !important;">
            <div class="row">
                <div class="col-12 align-self-center">
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
                    </nav>
                </div>
            </div>
        </div>
        <div class="container-fluid pt-0">
            <div class="tab-content" id="pills-tabContent">
                <div class="row mb-4">
                    <div class="col-12 d-flex justify-content-end">
                        <a href="{{ route('backend.employer.create') }}"
                            class="btn btn-sm d-flex align-items-center justify-content-center m-0 w-100 addButton"
                            style="padding: 8px; max-width: 230px;">
                            <i class="ri-add-line me-1"></i><span> Add New Employer</span>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card borderRadius">
                            <div class="card-body table-responsive p-0">
                                <table class="table tableStyle mb-0 dataTable align-middle" id="zero_config_Employer">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 50px;">S.N</th>
                                            <th scope="col">Employer Name</th>
                                            <th scope="col" class="text-center">Company Name</th>
                                            <th scope="col" class="text-center">Established Year</th>
                                            <th scope="col" class="text-center">OwnerShip / Size</th>
                                            <th scope="col" class="text-center">Location</th>
                                            <th scope="col" class="text-center">Status</th>
                                            <th scope="col" style="text-align: right;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employers as $employer)
                                            <tr>
                                                <td scope="row">1</td>
                                                <td class="">
                                                    <p class="nameTexts m-0">{{ $employer->user->name }}</p>
                                                    <p class="m-0 emailsEmp">{{ $employer->user->email }}</p>
                                                    <p class="m-0 emailsEmp">{{ $employer->user->phone }}</p>
                                                </td>
                                                <td class="text-center">
                                                    <p class="nameTexts m-0">{{ $employer->company_name ?? 'N/A' }}</p>
                                                    <p class="nameTexts m-0">{{ $employer->ceo_name ?? 'N/A' }}</p>
                                                    <p class="m-0 emailsEmp">{{ $employer->industry->name ?? 'N/A' }}</p>
                                                    <p class="m-0 emailsEmp">{{ $employer->funcationalArea->name ?? 'N/A' }}
                                                    </p>
                                                </td>
                                                <td class="text-center">
                                                    <p class="nameTexts m-0">{{ $employer->established_year ?? 'N/A' }}</p>
                                                </td>
                                                <td class="text-center">
                                                    <p class="nameTexts m-0">{{ $employer->ownership_type ?? 'N/A' }} /
                                                        {{ $employer->company_size ?? 'N/A' }}
                                                    </p>
                                                </td>
                                                <td class="text-center">
                                                    <p class="nameTexts m-0"><span
                                                            class="fw-bold">Primary.:</span>{{ $employer->location ?? 'N/A' }}
                                                    </p>
                                                    <p class="m-0 emailsEmp"><span class="fw-bold">Secondary.:</span>
                                                        {{ $employer->second_office_location ?? 'N/A' }}</p>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch d-flex justify-content-center">
                                                        <input class="form-check-input toggle_employer_status"
                                                            type="checkbox" role="switch"
                                                            data-encrypted-id="{{ encrypt($employer->id) }}"
                                                            {{ $employer->status ? 'checked' : '' }} style="width: 2.5em;">
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="button--group d-flex justify-content-end">
                                                        <a href="{{ route('backend.employer.edit', encrypt($employer->id)) }}"
                                                            class="btn btn-sm editButtons">
                                                            <i class="ri-edit-box-line"></i>
                                                        </a>

                                                        <!-- <a
                                                        class="btn btn-sm btn-outline--danger border-danger confirmationBtn delete_employers">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </a> -->
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('javascript-section')
    <script>
        $(document).ready(function() {
            $('#zero_config_Employer, #zero_config_reported_Employers').DataTable({
                responsive: true,
                language: {
                    search: '',
                    searchPlaceholder: 'Search',
                    lengthMenu: ' _MENU_'
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
