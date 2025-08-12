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
                            <button class="nav-link tabBTNs" id="pills-degree-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-degree" type="button" role="tab" aria-controls="pills-degree"
                                aria-selected="false">
                                Pending Jobs
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link tabBTNs" id="pills-reported-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-reported" type="button" role="tab"
                                aria-controls="pills-reported" aria-selected="false">
                                Job Categories
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link tabBTNs" id="pills-resumes-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-resumes" type="button" role="tab" aria-controls="pills-resumes"
                                aria-selected="false">
                                Job Types
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link tabBTNs" id="pills-selected-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-selected" type="button" role="tab"
                                aria-controls="pills-selected" aria-selected="false">
                                Job Tags
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link tabBTNs" id="pills-Job_shift" data-bs-toggle="pill"
                                data-bs-target="#pills-shift" type="button" role="tab" aria-controls="pills-shift"
                                aria-selected="false">
                                Job Shifts
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
                                                <th scope="col" class="text-center">Is Featured </th>
                                                <th scope="col" class="text-center">Is Suspended </th>
                                                <th scope="col" class="text-center">Created On </th>
                                                <th scope="col" class="text-center">Job Expiry Date</th>
                                                <th scope="col" class="text-center">Last Changes By</th>
                                                <th scope="col" style="text-align: right;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td scope="row">1</td>
                                                <td class="">
                                                    <a href="#">Aliqua Neque praese</a>
                                                </td>
                                                <td class="text-center d-flex justify-content-center">

                                                    <div class="btn-group">
                                                        <button class="btn btn-success btn-sm dropdown-toggle"
                                                            type="button" id="dropdownMenuButton"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            Featured
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <li><a class="dropdown-item" href="#">Removed
                                                                    Featured</a></li>
                                                        </ul>
                                                    </div>
                                                    <!-- <span class="badge rounded-pill font-weight-medium bg-light-info text-info ">Immediate Available</span> -->

                                                </td>
                                                <td class="">
                                                    <div class="form-check form-switch d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                            id="flexSwitchCheckChecked" checked style="width: 2.5em;">
                                                    </div>
                                                </td>

                                                <td class="d-flex justify-content-center">
                                                    <span
                                                        class="badge rounded-pill font-weight-medium bg-light-secondary text-secondary">9th
                                                        Jun, 2025</span>
                                                </td>

                                                <td>
                                                    <div class=" d-flex justify-content-center">
                                                        <span
                                                            class="badge rounded-pill font-weight-medium bg-light-info text-info ">20th
                                                            Jun, 2025</span>
                                                    </div>
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                    <span
                                                        class=" badge font-weight-medium bg-light-warning text-warning">Super
                                                        Admin</span>
                                                </td>
                                                <td>
                                                    <div class="button--group d-flex justify-content-end">
                                                        <a href="jobs_Edit.html" class="btn btn-sm  editButtons">
                                                            <i class="ri-edit-box-line"></i>
                                                        </a>
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

                <div class="tab-pane fade" id="pills-reported" role="tabpanel" aria-labelledby="pills-reported-tab">
                    <!--- data -->
                    <div class="row mb-4">
                        <div class="col-12 d-flex justify-content-end gap-3 flex-wrap">
                            <button class="btn btn-sm d-flex align-items-center justify-content-center m-0 w-100 addButton"
                                style="padding: 8px; max-width: 210px;" data-bs-toggle="modal"
                                data-bs-target="#JobCategories_add">
                                <i class="ri-add-line me-1"></i>
                                <span> Add</span>
                            </button>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card borderRadius">
                                <div class="card-body p-0 table-responsive ">

                                    <table class="table tableStyle mb-0 dataTable" id="zero_config_reported">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 50px;">S.N</th>
                                                <th scope="col">Job Category</th>

                                                <th scope="col" class="text-center">Is Featured</th>
                                                <th scope="col" class="text-center">Created On</th>
                                                <th scope="col" style="text-align: right;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td scope="row">1</td>
                                                <td class="">
                                                    <p>Software Development & Engineering</p>
                                                </td>

                                                <td class="">
                                                    <div class="form-check form-switch d-flex justify-content-center">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                            id="flexSwitchCheckChecked" checked=""
                                                            style="width: 2.5em;">
                                                    </div>
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                    <span
                                                        class="badge rounded-pill font-weight-medium bg-light-secondary text-secondary">9th
                                                        Jun, 2025</span>
                                                </td>
                                                <td>
                                                    <div class="button--group d-flex justify-content-end">
                                                        <button class="btn btn-sm  editButtons" data-bs-toggle="modal"
                                                            data-bs-target="#JobCategories_edit">
                                                            <i class="ri-edit-box-line"></i>
                                                        </button>
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
                <div class="tab-pane fade" id="pills-resumes" role="tabpanel" aria-labelledby="pills-resumes-tab">
                    <!---alll resume start  ----->

                    <div class="row mb-4">
                        <div class="col-12 d-flex justify-content-end gap-3 flex-wrap">
                            <button class="btn btn-sm d-flex align-items-center justify-content-center m-0 w-100 addButton"
                                style="padding: 8px; max-width: 210px;" data-bs-toggle="modal"
                                data-bs-target="#Jobtype_add">
                                <i class="ri-add-line me-1"></i>
                                <span> Add</span>
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card borderRadius">
                                <div class="card-body p-0 table-responsive">

                                    <table class="table tableStyle mb-0 dataTable" id="zero_config_reported">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 50px;">S.N</th>
                                                <th scope="col">Job Type </th>
                                                <th scope="col" class="text-center">Created Date</th>
                                                <th scope="col" style="text-align: right;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td scope="row">1</td>
                                                <td class="">
                                                    <p>Software Development & Engineering</p>
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                    <span
                                                        class="badge rounded-pill font-weight-medium bg-light-secondary text-secondary">9th
                                                        Jun, 2025</span>
                                                </td>
                                                <td>
                                                    <div class="button--group d-flex justify-content-end">
                                                        <button class="btn btn-sm  editButtons" data-bs-toggle="modal"
                                                            data-bs-target="#Jobtype_edit">
                                                            <i class="ri-edit-box-line"></i>
                                                        </button>
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

                    <!---alll resume end  ----->
                </div>
                <div class="tab-pane fade" id="pills-selected" role="tabpanel" aria-labelledby="pills-selected-tab">

                    <div class="row mb-4">
                        <div class="col-12 d-flex justify-content-end gap-3 flex-wrap">
                            <button class="btn btn-sm d-flex align-items-center justify-content-center m-0 w-100 addButton"
                                style="padding: 8px; max-width: 210px;" data-bs-toggle="modal"
                                data-bs-target="#JobTag_add">
                                <i class="ri-add-line me-1"></i>
                                <span> Add</span>
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card borderRadius">
                                <div class="card-body p-0 table-responsive">

                                    <table class="table tableStyle mb-0 dataTable" id="zero_config_reported">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 50px;">S.N</th>
                                                <th scope="col">Job Tag </th>
                                                <th scope="col" style="width: 200px;" class="">Description</th>
                                                <th scope="col" style="text-align: right;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td scope="row">1</td>
                                                <td class="">
                                                    <p>React.js</p>
                                                </td>
                                                <td class=" ">
                                                    Automated testing is the application of software tools to automate a
                                                    human-driven manual process of reviewing and validating a software
                                                    product. Most mode...
                                                </td>
                                                <td>
                                                    <div class="button--group d-flex justify-content-end">
                                                        <button class="btn btn-sm  editButtons" data-bs-toggle="modal"
                                                            data-bs-target="#JobTag_edit">
                                                            <i class="ri-edit-box-line"></i>
                                                        </button>
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

                </div>

                <div class="tab-pane fade" id="pills-shift" role="tabpanel" aria-labelledby="pills-Job_shift">

                    <div class="row mb-4">
                        <div class="col-12 d-flex justify-content-end gap-3 flex-wrap">
                            <button class="btn btn-sm d-flex align-items-center justify-content-center m-0 w-100 addButton"
                                style="padding: 8px; max-width: 210px;" data-bs-toggle="modal"
                                data-bs-target="#JobShift_add">
                                <i class="ri-add-line me-1"></i>
                                <span> Add</span>
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card borderRadius">
                                <div class="card-body p-0 table-responsive">

                                    <table class="table tableStyle mb-0 dataTable" id="zero_config_reported">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 50px;">S.N</th>
                                                <th scope="col">Shift </th>
                                                <th scope="col" class="">Created Date </th>
                                                <th scope="col" style="text-align: right;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td scope="row">1</td>
                                                <td class="">
                                                    <p>Night Shift</p>
                                                </td>
                                                <td class="">
                                                    <span
                                                        class="badge rounded-pill font-weight-medium bg-light-secondary text-secondary">9th
                                                        Jun, 2025</span>
                                                </td>
                                                <td>
                                                    <div class="button--group d-flex justify-content-end">
                                                        <button class="btn btn-sm  editButtons" data-bs-toggle="modal"
                                                            data-bs-target="#JobShift_edit">
                                                            <i class="ri-edit-box-line"></i>
                                                        </button>
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

                </div>


            </div>

        </div>

    </div>

    <!--------------------modal start------------------->
    <!--  degree_add  -->
    <div class="modal fade" id="JobCategories_add" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Job Category</h5>
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

    <!--  degree_edit  -->
    <div class="modal fade" id="JobCategories_edit" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Job Category</h5>
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


    <!---- job type -->

    <div class="modal fade" id="Jobtype_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Job Type</h5>
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

    <!--  job type edit  -->
    <div class="modal fade" id="Jobtype_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Job Type</h5>
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


    <!---- job tags -->

    <div class="modal fade" id="JobTag_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Job Tag</h5>
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

    <!--  job tags edit  -->
    <div class="modal fade" id="JobTag_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Job Tag</h5>
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


    <!---- job shift -->

    <div class="modal fade" id="JobShift_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Job Shift</h5>
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

    <!--  job tags edit  -->
    <div class="modal fade" id="JobShift_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Job Shift</h5>
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
