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
                            <li class="breadcrumb-item active" aria-current="page">
                                General
                            </li>
                        </ol>
                    </nav>
                </div>

                <div class="col-12 mt-4 tabBN">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active tabBTNs" id="pills-reported-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-reported" type="button" role="tab"
                                aria-controls="pills-reported" aria-selected="false">
                                Industries
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link tabBTNs" id="pills-selected-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-selected" type="button" role="tab"
                                aria-controls="pills-selected" aria-selected="false">
                                Functional Area
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid pt-0">
            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show active" id="pills-reported" role="tabpanel"
                    aria-labelledby="pills-reported-tab">
                    <!--- data -->
                    <div class="row mb-4">
                        <div class="col-12 d-flex justify-content-end gap-3 flex-wrap">
                            <button class="btn btn-sm d-flex align-items-center justify-content-center m-0 w-100 addButton"
                                style="padding: 8px; max-width: 210px;" data-bs-toggle="modal"
                                data-bs-target="#Industries_add">
                                <i class="ri-add-line me-1"></i>
                                <span> Add</span>
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card borderRadius">
                                <div class="card-body p-0 table-responsive">

                                    <table class="table tableStyle mb-0 dataTable align-middle" id="industry_Table">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 50px;">S.N</th>
                                                <th scope="col"> Industry</th>
                                                <th scope="col" style="text-align: right;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($industries as $industry)
                                                <tr>
                                                    <td scope="row">{{ $loop->iteration }}</td>
                                                    <td class="industry-name-cell">
                                                        {{ $industry->name }}
                                                    </td>
                                                    <td>
                                                        <div class="button--group d-flex justify-content-end">
                                                            <button class="btn btn-sm editButtons  edit-industryButton"
                                                                data-bs-toggle="modal" data-bs-target="#Industries_edit"
                                                                data-id="{{ encrypt($industry->id) }}"
                                                                data-name="{{ $industry->name }}"
                                                                data-route="{{ route('backend.general.industryUpdate', encrypt($industry->id)) }}">
                                                                <i class="ri-edit-box-line"></i>
                                                            </button>
                                                            <form
                                                                action="{{ route('backend.general.industryDestroy', encrypt($industry->id)) }}"
                                                                method="POST" class="ms-2 d-inline deleteIndustryForm">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button
                                                                    class="btn btn-sm btn-outline--danger border-danger confirmationBtn delete_Industry"
                                                                    data-id="{{ $industry->id }}">
                                                                    <i class="ri-delete-bin-line"></i>
                                                                </button>
                                                            </form>
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

                <div class="tab-pane fade" id="pills-selected" role="tabpanel" aria-labelledby="pills-selected-tab">

                    <div class="row mb-4">
                        <div class="col-12 d-flex justify-content-end gap-3 flex-wrap">
                            <button class="btn btn-sm d-flex align-items-center justify-content-center m-0 w-100 addButton"
                                style="padding: 8px; max-width: 210px;" data-bs-toggle="modal"
                                data-bs-target="#functianal_add">
                                <i class="ri-add-line me-1"></i>
                                <span> Add</span>
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card borderRadius">
                                <div class="card-body p-0 ">

                                    <table class="table tableStyle mb-0 dataTable" id="functional_Area">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 50px;">S.N</th>
                                                <th scope="col">Industry</th>
                                                <th scope="col">Funcational Area</th>
                                                <th scope="col" style="text-align: right;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($areas as $area)
                                                <tr>
                                                    <td scope="row">{{ $loop->iteration }}</td>
                                                    <td class="">
                                                        {{ $area->industry->name }}
                                                    </td>
                                                    <td class="">
                                                        {{ $area->name }}
                                                    </td>
                                                    <td>
                                                        <div class="button--group d-flex justify-content-end">
                                                            <button class="btn btn-sm editButtons edit_functionalArea"
                                                                data-bs-toggle="modal" data-id="{{ encrypt($area->id) }}"
                                                                data-name="{{ $area->name }}"
                                                                data-industry="{{ $area->industry_id }}"
                                                                data-route="{{ route('backend.general.functionalareaUpdate', encrypt($area->id)) }}">
                                                                <i class="ri-edit-box-line"></i>
                                                            </button>

                                                            <form
                                                                action="{{ route('backend.general.functionalAreaDestroy', encrypt($area->id)) }}"
                                                                method="POST"
                                                                class="ms-2 d-inline deleteFuncationalareaForm">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button
                                                                    class="btn btn-sm btn-outline--danger border-danger confirmationBtn delete_functionalarea">
                                                                    <i class="ri-delete-bin-line"></i>
                                                                </button>
                                                            </form>
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
    </div>
    <!--------------------modal start------------------->

    <!----  add Industries_add -->

    <div class="modal fade" id="Industries_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Industry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('backend.general.industryStore') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12 ">
                            <div class="form-group">
                                <label class="text-dark">Name <span class="text-danger"> *</span></label>
                                <input type="text" placeholder="Name" class="form-control typeText"
                                    name="industry_name" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--  edit Industries  -->
    <div class="modal fade" id="Industries_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Industry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="industryEditForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="col-12 ">
                            <input type="hidden" id="edit-industry-id" name="encrypted_id">
                            <div class="form-group">
                                <label class="text-dark">Name <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Name" id="edit-industry-name" class="form-control"
                                    name="edit_industry_name" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!---- add functianal  -->
    <div class="modal fade" id="functianal_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Functional Area</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('backend.general.functionalareaStore') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12 mb-2">
                            <div class="form-group">
                                <label class="text-dark">Industries<span class="text-danger"> *</span></label>
                                <select class="form-control selectForm" name="industry_id" id="select2-with-Industry"
                                    style="width: 100%;" required>
                                    <option value="">Select Industry</option>
                                    @foreach ($industries as $industry)
                                        <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-dark">Funcational Area<span class="text-danger"> *</span></label>
                                <input type="text" placeholder="Funcational Area" name="functional_area"
                                    class="form-control typeText" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- edit funcational area -->
    <div class="modal fade" id="functianal_edit" tabindex="-1" aria-labelledby="functianal_editLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="functianal_editLabel">Edit Functional Area</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="funcationalEditForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="col-12 mb-2">
                            <div class="form-group">
                                <label class="text-dark">Industries<span class="text-danger"> *</span></label>
                                <select class="form-control selectForm" name="industry_id" id="select2-with-Industry-id"
                                    style="width: 100%;" required>
                                    <option value="">Select Industry</option>
                                    @foreach ($industries as $industry)
                                        <option value="{{ $industry->id }}"
                                            {{ old('industry_id') == $industry->id ? 'selected' : '' }}>
                                            {{ $industry->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-dark">Funcational Area<span class="text-danger"> *</span></label>
                                <input type="text" placeholder="Funcational Area" name="functional_area"
                                    class="form-control typeText" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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
            $(' #industry_Table, #functional_Area')
                .DataTable({
                    responsive: true,
                    language: {
                        search: '',
                        searchPlaceholder: 'Search',
                        lengthMenu: ' _MENU_'
                    }
                });
            $('#select2-with-Industry', 'select2-with-Industry-id')
                .select2({
                    allowClear: true,
                    dropdownParent: $('#functianal_add', '#functianal_edit')
                });
        });

        // industry edit btn
        $('.edit-industryButton').on('click', function() {
            var $btn = $(this);
            var encryptedId = $btn.data('id');
            var name = $btn.data('name');
            var route = $btn.data('route');
            $('#edit-industry-id').val(encryptedId);
            $('#edit-industry-name').val(name);
            $('#industryEditForm').attr('action', route);
            $('#Industries_edit').modal('show');
        });

        // edit funcational area
        $('.edit_functionalArea').on('click', function() {
            var $btn = $(this);
            var encryptedId = $btn.data('id');
            var name = $btn.data('name');
            var industryId = $btn.data('industry');
            var route = $btn.data('route');

            $('#funcationalEditForm').attr('action', route);
            $('input[name="functional_area"]').val(name);
            $('#select2-with-Industry-id').val(industryId).trigger('change');

            $('#functianal_edit').modal('show');
        });

        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // edit industry
            $('#industryEditForm').on('submit', function(e) {
                e.preventDefault();
                var $form = $(this);
                var action = $form.attr('action');
                var payload = {
                    edit_industry_name: $('#edit-industry-name').val().trim()
                };

                $.ajax({
                    url: action,
                    type: 'PUT',
                    data: payload,
                    success: function(res) {
                        $('#Industries_edit').modal('hide');
                        $form[0].reset();

                        Swal.fire({
                            icon: 'success',
                            title: 'Updated!',
                            text: res.message || 'Industry updated successfully.',
                            showConfirmButton: true,
                            ConfirmButtonColor: '#70a1e0ff',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });

                        var encryptedId = $('#edit-industry-id').val();
                        $('button[data-id="' + encryptedId + '"]')
                            .closest('tr')
                            .find('.industry-name-cell')
                            .text(payload.edit_industry_name);
                    },
                    error: function(xhr) {
                        let errorMsg = 'Something went wrong while updating.';
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors || {};
                            errorMsg = Object.values(errors).flat().join('\n');
                        } else if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMsg = xhr.responseJSON.message;
                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: errorMsg
                        });
                    }
                });
            });
        });

        // delete industry
        $('.delete_Industry').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');

            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#bfc0c0ff',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });


        // delete Funcational area
        $('.delete_functionalarea').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');

            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#bfc0c0ff',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "{{ session('error') }}",
            });
        </script>
    @endif
@endsection
@endsection
