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
                <div class="col-12 mt-4 tabBN">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active tabBTNs" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-Employers" type="button" role="tab"
                                aria-controls="pills-Employers" aria-selected="true">
                                Employers
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link tabBTNs" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-ReportedEmployers" type="button" role="tab"
                                aria-controls="pills-ReportedEmployers" aria-selected="false">
                                Reported Employers
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid pt-0">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-Employers" role="tabpanel"
                    aria-labelledby="pills-home-tab">
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
                                    <table class="table tableStyle mb-0 dataTable" id="zero_config_Employer">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 50px;">S.N</th>
                                                <th scope="col">Employer Name</th>
                                                <th scope="col" class="text-center">Email Verified</th>
                                                <th scope="col" class="text-center">Status</th>
                                                <th scope="col" class="text-center">Last Changes By</th>
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
                                                    <span class="reloaduser"><a href="#"><i
                                                                class="ri-loop-right-line"></i></a></span>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                            id="flexSwitchCheckChecked" checked style="width: 2.5em;">
                                                    </div>
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                    <span
                                                        class="mb-1 badgesInfo rounded-pill badge--success font-weight-medium bg-light-success text-success">Super
                                                        Admin</span>
                                                </td>
                                                <td>
                                                    <div class="button--group d-flex justify-content-end">
                                                        <a href="{{ route('backend.employer.edit') }}"
                                                            class="btn btn-sm  editButtons">
                                                            <i class="ri-edit-box-line"></i>
                                                        </a>
                                                        <a
                                                            class="btn btn-sm btn-outline--danger border-danger confirmationBtn delete_employers">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row">2</td>
                                                <td class="">
                                                    <p class="nameTexts m-0">Deepak sahani</p>
                                                    <p class="m-0 emailsEmp">Deepatsahani@gmail.com</p>
                                                </td>
                                                <td class="text-center d-flex justify-content-center">
                                                    <span class="reloaduser"><a href="#"><i
                                                                class="ri-loop-right-line"></i></a></span>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                            id="flexSwitchCheckChecked" checked style="width: 2.5em;">
                                                    </div>
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                    <span
                                                        class="mb-1 badgesInfo rounded-pill badge--success font-weight-medium bg-light-success text-success">Super
                                                        Admin</span>
                                                </td>
                                                <td>
                                                    <div class="button--group d-flex justify-content-end">
                                                        <a href="employers_Edit.html" class="btn btn-sm  editButtons">
                                                            <i class="ri-edit-box-line"></i>
                                                        </a>
                                                        <a
                                                            class="btn btn-sm btn-outline--danger border-danger confirmationBtn delete_employers">
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
                <div class="tab-pane fade" id="pills-ReportedEmployers" role="tabpanel"
                    aria-labelledby="pills-profile-tab">
                    <div class="row">
                        <div class="col-12">
                            <div class="card borderRadius">
                                <div class="card-body p-0 table-responsive">
                                    <table class="table tableStyle mb-0 dataTable" id="zero_config_reported_Employers">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 50px;">S.N</th>
                                                <th scope="col">Employer Name</th>
                                                <th scope="col" class="text-center">Reported By</th>
                                                <th scope="col" class="text-center">Reported On</th>
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
                                                    Candidate A
                                                </td>

                                                <td class="">
                                                    <div class="d-flex justify-content-center">
                                                        <span
                                                            class="mb-1 badgesInfo rounded-pill  font-weight-medium  text-secondary bg-light-secondary ">Super
                                                            Admin</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="button--group d-flex justify-content-end">
                                                        <button
                                                            class="btn btn-sm btn-outline--danger border-danger confirmationBtn delete_Reported">
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
    </script>
@endsection
@endsection
