@extends('layouts.backend.main')
@section('main-section')

    <!--- page wrapper section starts-->
    <div class="page-wrapper">

        <div class="page-titles" style="padding-bottom: 0px !important;">
            <div class="row">
                <div class="col-12 align-self-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-flex align-items-center">
                            <li class="breadcrumb-item">
                                <a href=".{{ route('backend.dashboard') }}" class="link"><i
                                        class="ri-home-3-line fs-5"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Jobs
                            </li>
                        </ol>
                    </nav>
                </div>

                <div class="col-12 mt-4 tabBN">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button class="nav-link active tabBTNs" id="pills-candidates-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-candidates" type="button" role="tab"
                                aria-controls="pills-candidates" aria-selected="true">
                                Jobs
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link tabBTNs active" id="pills-degree-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-degree" type="button" role="tab" aria-controls="pills-degree"
                                aria-selected="true">
                                Pending Jobs
                            </button>
                        </li>
                    </ul>
                </div>

            </div>

        </div>

        <div class="container-fluid pt-0">
            <!-- row -->

            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show active" id="pills-candidates" role="tabpanel"
                    aria-labelledby="pills-candidates-tab">
                    <!--- data -->
                    <div class="row mb-4">
                        <div class="col-12 d-flex justify-content-end gap-3 flex-wrap">
                            <a href="{{ route('backend.jobs.create') }}"
                                class="btn btn-sm d-flex align-items-center justify-content-center m-0 w-100 addButton"
                                style="padding: 8px; max-width: 210px;">
                                <i class="ri-add-line me-1"></i>
                                <span> Add Jobs</span>
                            </a>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card borderRadius">
                                <div class="card-body p-0 table-responsive">

                                    <table class="table tableStyle mb-0 dataTable" id="zero_config_condidates">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 50px;">S.N</th>
                                                <th scope="col">Job Title </th>
                                                <th scope="col" class="text-center">Location </th>
                                                <th scope="col" class="text-center">Is Suspended </th>
                                                <th scope="col" class="text-center">Created On </th>
                                                <th scope="col" class="text-center">Job Expiry Date</th>
                                                <th scope="col" class="text-center">Last Changes By</th>
                                                <th scope="col" style="text-align: right;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($jobs as $job)
                                                <tr>
                                                    <td scope="row">{{ $loop->iteration }}</td>
                                                    <td class="">
                                                        <a href="#">{{ $job->job_title }}</a>
                                                    </td>
                                                    <td class="text-center ">
                                                        {{ $job->state->name }}
                                                    </td>
                                                    <td class="">
                                                        <div class="form-check form-switch d-flex justify-content-center">
                                                            <input class="form-check-input job-status-toggle"
                                                                type="checkbox" role="switch"
                                                                data-id="{{ encrypt($job->id) }}"
                                                                {{ $job->status ? 'checked' : '' }} checked
                                                                style="width: 2.5em;">
                                                        </div>
                                                    </td>

                                                    <td class="text-center">
                                                        <span
                                                            class="badge rounded-pill font-weight-medium bg-light-secondary text-secondary">{{ $job->created_at->format('d M, Y') }}
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <div class=" d-flex justify-content-center">
                                                            <span
                                                                class="badge rounded-pill font-weight-medium bg-light-info text-info ">{{ $job->job_expiry->format('d M, Y') }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <span
                                                            class=" badge font-weight-medium bg-light-warning text-warning">{{ $job->getCreatedBy->name }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="button--group d-flex justify-content-end">
                                                            <a href="{{ route('backend.jobs.edit', encrypt($job->id)) }}"
                                                                class="btn btn-sm  editButtons">
                                                                <i class="ri-edit-box-line"></i>
                                                            </a>
                                                            <button
                                                                class="btn btn-sm btn-outline--danger border-danger confirmationBtn delete_condidates">
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
                    </div>
                    <!--- data end-->

                </div>

                <div class="tab-pane fade" id="pills-degree" role="tabpanel" aria-labelledby="pills-degree-tab">

                    <!--- data -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card borderRadius">
                                <div class="card-body p-0 table-responsive ">

                                    <table class="table tableStyle mb-0 dataTable" id="zero_config_digree_levels">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 50px;">S.N</th>
                                                <th scope="col">Job Title</th>
                                                <th scope="col" class="text-center">Created On</th>
                                                <th scope="col" class="text-center">Job Expiry Date</th>
                                                <th scope="col" class="text-center">Employers Name</th>
                                                <th scope="col" style="text-align: right;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td scope="row">1</td>
                                                <td class="">
                                                    Aliqua Neque praese
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                    <span
                                                        class="badge rounded-pill font-weight-medium bg-light-secondary text-secondary">
                                                        9th May, 2025</span>
                                                </td>
                                                <td>
                                                    <div class=" d-flex justify-content-center">
                                                        <span
                                                            class="badge rounded-pill font-weight-medium bg-light-info text-info ">20th
                                                            Jun, 2025</span>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    Deepak
                                                </td>
                                                <td>
                                                    <div class="button--group d-flex justify-content-end">
                                                        <button
                                                            class="btn btn-sm btn-outline--danger border-danger confirmationBtn delete_condidates">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- data end-->

                </div>
            </div>
        </div>
    </div>

@section('javascript-section')
    <script>
        $(document).ready(function() {
            $('#zero_config_condidates, #zero_config_digree_levels')
                .DataTable({
                    responsive: true,
                    language: {
                        search: '',
                        searchPlaceholder: 'Search',
                        lengthMenu: ' _MENU_'
                    }
                });
        });
    </script>

    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success ') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error ') }}',
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

        document.querySelectorAll('.job-status-toggle').forEach(function(checkbox) {
            checkbox.addEventListener('change', function(event) {
                let encryptedId = this.getAttribute('data-id');
                let newStatus = this.checked ? 1 : 0;
                let checkboxElement = this;

                checkboxElement.checked = !checkboxElement.checked;

                Swal.fire({
                    title: 'Are you sure?',
                    text: newStatus ? "Activate this job?" : "Deactivate this job?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, update it'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/admin/jobs/status/update`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute('content'),
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    id: encryptedId,
                                    status: newStatus
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    checkboxElement.checked = !!newStatus;
                                    Swal.fire('Updated!', 'Job status has been updated.',
                                        'success');
                                } else {
                                    Swal.fire('Error!', 'Could not update job status.',
                                    'error');
                                }
                            })
                            .catch(() => {
                                Swal.fire('Error!', 'Something went wrong.', 'error');
                            });
                    }
                });
            });
        });
    </script>
@endsection
@endsection
