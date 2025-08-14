@extends('layouts.backend.main')
@section('main-section')

    <div class="page-wrapper">

        <div class="page-titles" style="padding-bottom: 0px !important;">
            <div class="row">
                <div class="col-12 align-self-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-flex align-items-center">
                            <li class="breadcrumb-item">
                                <a href="{{ route('backend.dashboard') }}" class="link"><i
                                        class="ri-home-3-line fs-5"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Candidates</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-12 mt-4 tabBN">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active tabBTNs" id="pills-candidates-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-candidates" type="button" role="tab"
                                aria-controls="pills-candidates" aria-selected="true">
                                Candidates
                            </button>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid pt-0">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-candidates" role="tabpanel"
                    aria-labelledby="pills-candidates-tab">
                    <div class="row mb-4">
                        <div class="col-12 d-flex justify-content-end gap-3 flex-wrap">
                            <a href="{{ route('backend.condidate_create') }}"
                                class="btn btn-sm d-flex align-items-center justify-content-center m-0 w-100 addButton"
                                style="padding: 8px; max-width: 210px;">
                                <i class="ri-add-line me-1"></i>
                                <span> Add Condidates</span>
                            </a>
                            <button class="btn btn-sm d-flex align-items-center justify-content-center m-0 w-100 addButton"
                                style="padding: 8px; max-width: 210px;">
                                <i class="ri-add-line me-1"></i>
                                <span> Export to Excel</span>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @php
                                $sn = 1;
                            @endphp
                            @if (count($condidates) > 0)
                                <div class="card borderRadius">
                                    <div class="card-body p-0 table-responsive">
                                        <table class="table tableStyle mb-0 dataTable" id="zero_config_condidates">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width: 50px;">S.N</th>
                                                    <th scope="col">Candidate Name</th>
                                                    <th scope="col" class="text-center">Available At</th>
                                                    <th scope="col" class="text-center">Email Verified</th>
                                                    <th scope="col" class="text-center">Status</th>
                                                    <th scope="col" class="text-center">Last Changes By</th>
                                                    <th scope="col" style="text-align: right;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($condidates as $condidate)
                                                    <tr>
                                                        <td scope="row">{{ $sn++ }}</td>
                                                        <td class="">
                                                            <p class="nameTexts m-0">{{ $condidate->name ?? '' }}</p>
                                                            <p class="m-0 emailsEmp">{{ $condidate->email ?? '' }}</p>
                                                        </td>
                                                        <td class="text-center d-flex justify-content-center">
                                                            <span
                                                                class="badge rounded-pill font-weight-medium bg-light-info text-info">{{ $condidate->getCondidateDetail->availability }}</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="reloaduser"><a href="#"><i
                                                                        class="ri-loop-right-line"></i></a></span>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="form-check form-switch d-flex justify-content-center">
                                                                <input class="form-check-input" type="checkbox"
                                                                    role="switch" id="flexSwitchCheckChecked" checked
                                                                    style="width: 2.5em;">
                                                            </div>
                                                        </td>
                                                        <td class="d-flex justify-content-center">
                                                            <span
                                                                class="badge rounded-pill font-weight-medium bg-light-secondary text-secondary">{{ $condidate->getAmendedBy->name ?? '' }}</span>
                                                        </td>
                                                        <td>
                                                            <div class="button--group d-flex justify-content-end">
                                                                <a href="{{ route('backend.condidate_edit', [Crypt::encrypt($condidate->id)]) }}"
                                                                    class="btn btn-sm  editButtons">
                                                                    <i class="ri-edit-box-line"></i>
                                                                </a>
                                                                <button
                                                                    data-url="{{ route('backend.condidate_softDelete', [Crypt::encrypt($condidate->id)]) }}"
                                                                    data-token="{{ csrf_token() }}"
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
                            @else
                                <center>No Data Available</center>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--------------------modal start------------------->
    <!--  degree_add  -->
    <div class="modal fade" id="degree_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Degree Level</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('backend.degree_create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12 ">
                            <div class="form-group">
                                <label class="text-dark">Name <span class="text-danger"> *</span></label>
                                <input type="text" placeholder="Name" class="form-control typeText" name="name"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  degree_edit  -->
    <div class="modal fade" id="degree_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Degree Level</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 ">
                        <div class="form-group">
                            <label class="text-dark">Name <span class="text-danger"> *</span></label>
                            <input type="text" placeholder="Name" class="form-control typeText" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!--------------------modal end-->
    </div>
    </div>
@section('javascript-section')
    @foreach (['created', 'updated', 'deleted'] as $msg)
        @if (Session::has($msg))
            <script>
                Swal.fire({
                    title: "Success!",
                    text: "{{ Session::get($msg) }}",
                    icon: "success"
                });
            </script>
        @endif
    @endforeach
    {{-- <script>
        document.querySelectorAll('.confirmationBtn').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                let url = this.getAttribute('data-url');
                let token = this.getAttribute('data-token');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete the user?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = url;

                        const tokenInput = document.createElement('input');
                        tokenInput.type = 'hidden';
                        tokenInput.name = '_token';
                        tokenInput.value = token;
                        form.appendChild(tokenInput);

                        const methodInput = document.createElement('input');
                        methodInput.type = 'hidden';
                        methodInput.name = '_method';
                        methodInput.value = 'DELETE';
                        form.appendChild(methodInput);

                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
        });


        // function toggleStatus(degreeId, isChecked) {
        //     fetch({{ route('degrees.updateStatus', []) }}), {
        //             method: 'POST',
        //             headers: {
        //                 'Content-Type': 'application/json',
        //                 'Accept': 'application/json',
        //                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        //             },
        //             body: JSON.stringify({
        //                 status: isChecked ? 1 : 0
        //             })
        //         })
        //         .then(response => {
        //             if (!response.ok) {
        //                 throw new Error(`HTTP error! status: ${response.status}`);
        //             }
        //             return response.json();
        //         })
        //         .then(data => {
        //             if (data.success) {
        //                 console.log('Success:', data.message);
        //             } else {
        //                 alert("Something went wrong on the server.");
        //             }
        //         })
        //         .catch(error => {
        //             console.error('Error:', error);
        //             alert("Error updating status");
        //         });
        // }
    </script> --}}

    <script>
        $(document).ready(function() {
            $('#zero_config_condidates, #zero_config_digree_levels, #zero_config_reported, #selected_condidate')
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
@endsection

@endsection
