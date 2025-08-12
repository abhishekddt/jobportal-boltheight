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
                            <button class="nav-link active tabBTNs" id="pills-candidates-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-candidates" type="button" role="tab"
                                aria-controls="pills-candidates" aria-selected="true">
                                Marital Status
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link tabBTNs" id="pills-degree-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-degree" type="button" role="tab" aria-controls="pills-degree"
                                aria-selected="false">
                                Salary Periods
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link tabBTNs" id="pills-reported-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-reported" type="button" role="tab"
                                aria-controls="pills-reported" aria-selected="false">
                                Industries
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link tabBTNs" id="pills-resumes-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-resumes" type="button" role="tab" aria-controls="pills-resumes"
                                aria-selected="false">
                                Company Sizes
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link tabBTNs" id="pills-selected-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-selected" type="button" role="tab"
                                aria-controls="pills-selected" aria-selected="false">
                                Functional
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
                    <!--- data -->
                    <div class="row mb-4">
                        <div class="col-12 d-flex justify-content-end gap-3 flex-wrap">
                            <button class="btn btn-sm d-flex align-items-center justify-content-center m-0 w-100 addButton"
                                style="padding: 8px; max-width: 210px;" data-bs-toggle="modal"
                                data-bs-target="#marital_Status_add">
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
                                                <th scope="col">Marital Status </th>
                                                <th scope="col" class="text-center">Created Date</th>
                                                <th scope="col" style="text-align: right;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td scope="row">1</td>
                                                <td class="">
                                                    <p>Married</p>
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                    <span
                                                        class="badge rounded-pill font-weight-medium bg-light-secondary text-secondary">9th
                                                        Jun, 2025</span>
                                                </td>
                                                <td>
                                                    <div class="button--group d-flex justify-content-end">
                                                        <button class="btn btn-sm  editButtons" data-bs-toggle="modal"
                                                            data-bs-target="#marital_Status_edit">
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
                <div class="tab-pane fade" id="pills-degree" role="tabpanel" aria-labelledby="pills-degree-tab">

                    <!--- data -->
                    <div class="row mb-4">
                        <div class="col-12 d-flex justify-content-end gap-3 flex-wrap">
                            <button class="btn btn-sm d-flex align-items-center justify-content-center m-0 w-100 addButton"
                                style="padding: 8px; max-width: 210px;" data-bs-toggle="modal"
                                data-bs-target="#salary_periods_add">
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
                                                <th scope="col"> Period </th>
                                                <th scope="col" class="text-center">Created Date</th>
                                                <th scope="col" style="text-align: right;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td scope="row">1</td>
                                                <td class="">
                                                    <p> <a href="#">Every Other Week Pay Period</a> </p>
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                    <span
                                                        class="badge rounded-pill font-weight-medium bg-light-secondary text-secondary">9th
                                                        Jun, 2025</span>
                                                </td>
                                                <td>
                                                    <div class="button--group d-flex justify-content-end">
                                                        <button class="btn btn-sm  editButtons" data-bs-toggle="modal"
                                                            data-bs-target="#salary_periods_edit">
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

                <div class="tab-pane fade" id="pills-reported" role="tabpanel" aria-labelledby="pills-reported-tab">
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

                                    <table class="table tableStyle mb-0 dataTable" id="zero_config_reported">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 50px;">S.N</th>
                                                <th scope="col"> Name </th>
                                                <th scope="col" class="">Description</th>
                                                <th scope="col" style="text-align: right;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td scope="row">1</td>
                                                <td class="">
                                                    <p> <a href="#">Transport</a> </p>
                                                </td>
                                                <td class="">
                                                    Manufacturing is the production of products for use or sale using labor
                                                    and machines
                                                </td>
                                                <td>
                                                    <div class="button--group d-flex justify-content-end">
                                                        <button class="btn btn-sm  editButtons" data-bs-toggle="modal"
                                                            data-bs-target="#Industries_edit">
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
                                data-bs-target="#company_size_add">
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
                                                <th scope="col"> Size </th>
                                                <th scope="col" class="text-center">Created Date</th>
                                                <th scope="col" style="text-align: right;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td scope="row">1</td>
                                                <td class="">
                                                    <p>1000-200055 </p>
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                    <span
                                                        class="badge rounded-pill font-weight-medium bg-light-secondary text-secondary">9th
                                                        Jun, 2025</span>
                                                </td>
                                                <td>
                                                    <div class="button--group d-flex justify-content-end">
                                                        <button class="btn btn-sm  editButtons" data-bs-toggle="modal"
                                                            data-bs-target="#company_size_edit">
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

                                    <table class="table tableStyle mb-0 dataTable" id="zero_config_reported">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 50px;">S.N</th>
                                                <th scope="col">Name </th>
                                                <th scope="col" class="text-center">Created Date</th>
                                                <th scope="col" style="text-align: right;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="row">1</td>
                                                <td class="">
                                                    <p>Human Resource</p>
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                    <span
                                                        class="badge rounded-pill font-weight-medium bg-light-secondary text-secondary">9th
                                                        Jun, 2025</span>
                                                </td>
                                                <td>
                                                    <div class="button--group d-flex justify-content-end">
                                                        <button class="btn btn-sm  editButtons" data-bs-toggle="modal"
                                                            data-bs-target="#functianal_edit">
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
    <!--  New Marital Status  -->
    <div class="modal fade" id="marital_Status_add" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Marital Status</h5>
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

    <!--  edit Marital Status  -->
    <div class="modal fade" id="marital_Status_edit" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Marital Status</h5>
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


    <!---- add Salary Period -->

    <div class="modal fade" id="salary_periods_add" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Salary Period</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 ">
                        <div class="form-group">
                            <label class="text-dark">Period <span class="text-danger"> *</span></label>
                            <input type="text" placeholder="Period" class="form-control typeText" required>
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

    <!--  Edit Salary Period  -->
    <div class="modal fade" id="salary_periods_edit" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Salary Period</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 ">
                        <div class="form-group">
                            <label class="text-dark">Period <span class="text-danger"> *</span></label>
                            <input type="text" placeholder="Period" class="form-control typeText" required>
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

    <!----  add Industries_add -->

    <div class="modal fade" id="Industries_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Industry</h5>
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

    <!--  edit Industries_  -->
    <div class="modal fade" id="Industries_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Industry</h5>
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


    <!---- add functianal  -->

    <div class="modal fade" id="functianal_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Company Size</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 ">
                        <div class="form-group">
                            <label class="text-dark">Size <span class="text-danger"> *</span></label>
                            <input type="number" placeholder="Size" class="form-control shortcode" required>
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
    <div class="modal fade" id="functianal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Company Size</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 ">
                        <div class="form-group">
                            <label class="text-dark">Size <span class="text-danger"> *</span></label>
                            <input type="number" placeholder="Size" class="form-control shortcode" required>
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
