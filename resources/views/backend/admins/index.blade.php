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
                                        <th scope="col" class="text-center">Added By</th>
                                        <th scope="col" class="text-center">Edited By</th>
                                        <th scope="col" style="text-align: right;">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td class="">
                                            <p class="nameTexts m-0">Deepak</p>
                                            <p class="m-0 emailsEmp">Deepat@gmail.com</p>
                                        </td>
                                        <td class="text-center d-flex justify-content-center">
                                            7977619557
                                        </td>
                                        <td>
                                            <div class="form-check form-switch d-flex justify-content-center">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="flexSwitchCheckChecked" checked style="width: 2.5em;">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            Deepak
                                        </td>
                                        <td class="text-center">
                                            Anil
                                        </td>
                                        <td>
                                            <div class="button--group d-flex justify-content-end">
                                                <a href="{{ route('backend.admin.edit_admin') }}"
                                                    class="btn btn-sm  editButtons">
                                                    <i class="ri-edit-box-line"></i>
                                                </a>
                                                <a class="btn btn-sm btn-outline--danger border-danger confirmationBtn">
                                                    <i class="ri-delete-bin-line"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <footer class="footer"></footer>

    </div>



    </div>


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
    </script>
@endsection
@endsection
