@extends('layouts.backend.main')
@section('main-section')

    <!--- page wrapper section starts-->
    <div class="page-wrapper">

        <div class="page-titles">
            <div class="row">
                <div class="col-12 align-self-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-flex align-items-center">
                            <li class="breadcrumb-item">
                                <a href="{{ route('backend.admin.all_admins') }}" class="link"><i
                                        class="ri-home-3-line fs-5"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Admins</li>
                        </ol>
                        <h3 class="mb-0 fw-bold">Admins</h3>
                    </nav>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route('backend.admin.create_admin') }}"
                        class="btn btn-sm d-flex align-items-center justify-content-center m-0 w-100 addButton"
                        style="padding: 8px; max-width: 220px;">
                        <i class="ri-add-line me-1"></i>
                        <span> Add</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card borderRadius">
                        <div class="card-body p-0 table-responsive">
                            <table class="table tableStyle mb-0 dataTable DataTables" id="">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 50px;">S.N</th>
                                        <th scope="col">Name</th>
                                        <th scope="col" class="text-center">Phone</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Created By</th>
                                        <th scope="col" style="text-align: right;">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td class="">
                                                <p class="nameTexts m-0">{{ $admin->name }}</p>
                                                <p class="m-0 emailsEmp">{{ $admin->email }}</p>
                                            </td>
                                            <td class="text-center ">
                                                {{ $admin->phone }}
                                            </td>
                                            <td>
                                                <div class="form-check form-switch d-flex justify-content-center">
                                                    <input class="form-check-input toogle_admin_status" type="checkbox"
                                                        role="switch" data-id="{{ encrypt($admin->id) }}"
                                                        {{ $admin->status ? 'checked' : '' }} style="width: 2.5rem;">
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $admin->getCreatedBy->name }}
                                            </td>
                                            <td>
                                                <div class="button--group d-flex justify-content-end">
                                                    <a href="{{ route('backend.admin.edit_admin', encrypt($admin->id)) }}"
                                                        class="btn btn-sm  editButtons">
                                                        <i class="ri-edit-box-line"></i>
                                                    </a>
                                                    <!-- <a class="btn btn-sm btn-outline--danger border-danger confirmationBtn">
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

        <footer class="footer"></footer>
    </div>


@section('javascript-section')
    <script>
        $(document).ready(function() {
            $('.DataTables').DataTable({
                responsive: true,
                language: {
                    search: '',
                    searchPlaceholder: 'Search',
                    lengthMenu: ' _MENU_'
                }
            });
        });

        document.querySelectorAll('.toogle_admin_status').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                let encryptedId = this.dataset.id;
                let originalState = !this.checked;

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to change this admin's status.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/admin/all-admins/toggle-status/${encryptedId}`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute('content'),
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({})
                            })
                            .then(res => res.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire(
                                        'Updated!',
                                        'Admin status has been updated.',
                                        'success'
                                    );
                                } else {
                                    Swal.fire('Error', data.message ||
                                        'Failed to update status.',
                                        'error');
                                    checkbox.checked = originalState;
                                }
                            })
                            .catch(() => {
                                Swal.fire('Error', 'Server error.', 'error');
                                checkbox.checked = originalState;
                            });
                    } else {
                        checkbox.checked = originalState;
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
                text: '{{ session('success ') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session(' error ') }}',
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
