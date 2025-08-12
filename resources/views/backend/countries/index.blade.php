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
                                Countries
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
                                Countries
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link tabBTNs" id="pills-degree-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-degree" type="button" role="tab" aria-controls="pills-degree"
                                aria-selected="false">
                                States
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link tabBTNs" id="pills-reported-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-reported" type="button" role="tab"
                                aria-controls="pills-reported" aria-selected="false">
                                Cities
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
                            <button class="btn btn-sm d-flex align-items-center justify-content-center m-0 w-100 addButton"
                                style="padding: 8px; max-width: 210px;" data-bs-toggle="modal"
                                data-bs-target="#country_code_add">
                                <i class="ri-add-line me-1"></i>
                                <span> Add</span>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @php
                                $sn = 1;
                            @endphp
                            @if (count($countries) > 0)
                                <div class="card borderRadius">
                                    <div class="card-body p-0 table-responsive">
                                        <table class="table tableStyle mb-0 dataTable" id="zero_config_reported">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width: 50px;">S.N</th>
                                                    <th scope="col">Country Name</th>
                                                    <th scope="col" class="text-center">Short Code</th>
                                                    <th scope="col" class="text-center">Phone Code</th>
                                                    <th scope="col" style="text-align: right;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($countries as $country)
                                                    <tr>
                                                        <td scope="row">{{ $sn++ }}</td>
                                                        <td class="">
                                                            <p>{{ $country->name }}</p>
                                                        </td>
                                                        <td class="">
                                                            <div class="d-flex justify-content-center">
                                                                <span
                                                                    class="badge font-weight-medium  bg-light-info text-info ">{{ $country->iso2 }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="d-flex justify-content-center">
                                                            <span
                                                                class="badge font-weight-medium  bg-light-primary text-primary border-0">{{ $country->phonecode }}</span>
                                                        </td>
                                                        <td>
                                                            <div class="button--group d-flex justify-content-end">
                                                                <button class="btn btn-sm  editButtons"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#country_code_edit">
                                                                    <i class="ri-edit-box-line"></i>
                                                                </button>
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
                                {{-- {{ $countries->links('pagination::bootstrap-5') }} --}}
                            @else
                                <center>No Record Available</center>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-degree" role="tabpanel" aria-labelledby="pills-degree-tab">
                    <div class="row mb-4">
                        <div class="col-12 d-flex justify-content-end gap-3 flex-wrap">
                            <button class="btn btn-sm d-flex align-items-center justify-content-center m-0 w-100 addButton"
                                style="padding: 8px; max-width: 210px;" data-bs-toggle="modal" data-bs-target="#state_add">
                                <i class="ri-add-line me-1"></i>
                                <span> Add</span>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @php
                                $sns = 1;
                            @endphp
                            @if (count($states) > 0)
                                <div class="card borderRadius">
                                    <div class="card-body p-0 table-responsive">
                                        <table class="table tableStyle mb-0 dataTable" id="zero_config_reported">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width: 50px;">S.N</th>
                                                    <th scope="col">State Name</th>
                                                    <th scope="col" class="text-center">Country Name</th>
                                                    <th scope="col" style="text-align: right;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($states as $state)
                                                    <tr>
                                                        <td scope="row">{{ $sns++ }}</td>
                                                        <td class="">
                                                            <p class="mb-0">{{ $state->name }}</p>
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $state->getCountry->name }}
                                                        </td>
                                                        <td>
                                                            <div class="button--group d-flex justify-content-end">
                                                                <button class="btn btn-sm  editButtons"
                                                                    data-bs-toggle="modal" data-bs-target="#state_edit">
                                                                    <i class="ri-edit-box-line"></i>
                                                                </button>
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
                                {{-- {{ $states->links('pagination::bootstrap-5') }} --}}
                            @else
                            @endif
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-reported" role="tabpanel" aria-labelledby="pills-reported-tab">
                    <div class="row mb-4">
                        <div class="col-12 d-flex justify-content-end gap-3 flex-wrap">
                            <button class="btn btn-sm d-flex align-items-center justify-content-center m-0 w-100 addButton"
                                style="padding: 8px; max-width: 210px;" data-bs-toggle="modal"
                                data-bs-target="#city_add">
                                <i class="ri-add-line me-1"></i>
                                <span> Add</span>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @php
                                $snc = 1;
                            @endphp
                            <div class="card borderRadius">
                                <div class="card-body p-0 table-responsive">
                                    @if (count($cities) > 0)
                                        <table class="table tableStyle mb-0 dataTable" id="zero_config_reported">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width: 50px;">S.N</th>
                                                    <th scope="col">City Name</th>
                                                    <th scope="col" class="text-center">State Name</th>
                                                    <th scope="col" style="text-align: right;">Actions</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($cities as $city)
                                                    <tr>
                                                        <td scope="row">{{ $snc++ }}</td>
                                                        <td class="">
                                                            <p class="mb-0">{{ $city->name }}</p>
                                                        </td>

                                                        <td class="text-center">
                                                            UP
                                                        </td>

                                                        <td>
                                                            <div class="button--group d-flex justify-content-end">
                                                                <button class="btn btn-sm  editButtons"
                                                                    data-bs-toggle="modal" data-bs-target="#state_edit">
                                                                    <i class="ri-edit-box-line"></i>
                                                                </button>
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
                                        {{-- {{ $cities->links('pagination::bootstrap-5') }} --}}
                                    @else
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- data end-->
                </div>

            </div>

        </div>

    </div>

    <!--------------------modal start------------------->
    <!--  country_add  -->
    <div class="modal fade" id="country_code_add" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Country</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 ">
                        <div class="form-group">
                            <label class="text-dark">Name <span class="text-danger"> *</span></label>
                            <input type="text" placeholder="Name" class="form-control typeText" required>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="form-group">
                            <label class="text-dark">Short Code <span class="text-danger"> *</span></label>
                            <input type="number" placeholder="Short Code" class="form-control shortCode" required>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="form-group">
                            <label class="text-dark">Phone Code <span class="text-danger"> *</span></label>
                            <input type="number" placeholder="Phone Code" class="form-control phoneCode" required>
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

    <!--  country_code_add  -->
    <div class="modal fade" id="country_code_edit" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Country</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 ">
                        <div class="form-group">
                            <label class="text-dark">Name <span class="text-danger"> *</span></label>
                            <input type="text" placeholder="Name" class="form-control typeText" required>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="form-group">
                            <label class="text-dark">Short Code <span class="text-danger"> *</span></label>
                            <input type="number" placeholder="Short Code" class="form-control shortcode" required>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="form-group">
                            <label class="text-dark">Phone Code <span class="text-danger"> *</span></label>
                            <input type="number" placeholder="Phone Code" class="form-control phoneCode" required>
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


    <!---- state add modal -->

    <div class="modal fade parentModal" id="state_add" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New State</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 ">
                        <div class="form-group">
                            <label class="text-dark">Name <span class="text-danger"> *</span></label>
                            <input type="text" placeholder="Name" class="form-control typeText" required>
                        </div>
                    </div>
                    <div class="col-12 mt-3 ">
                        <div class="form-group">
                            <label class="text-dark">Country Name <span class="text-danger"> *</span></label>
                            <select class="form-control selectForm select_searchBox" style="width: 100%;">
                                <option selected>India</option>
                                <option>ABC</option>
                            </select>

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

    <!--  state  edit  -->
    <div class="modal fade parentModal" id="state_edit" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit State</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 ">
                        <div class="form-group">
                            <label class="text-dark">Name <span class="text-danger"> *</span></label>
                            <input type="text" placeholder="Name" class="form-control typeText" required>
                        </div>
                        <div class="col-12 mt-3 ">
                            <div class="form-group">
                                <label class="text-dark">Country Name <span class="text-danger"> *</span></label>
                                <select class="form-control selectForm select_searchBox" style="width: 100%;">
                                    <option selected>India</option>
                                    <option>ABC</option>
                                </select>
                            </div>
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


    <!---- city add -->

    <div class="modal fade" id="city_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New City</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 ">
                        <div class="form-group">
                            <label class="text-dark">Name <span class="text-danger"> *</span></label>
                            <input type="text" placeholder="Name" class="form-control typeText" required>
                        </div>
                    </div>
                    <div class="col-12 mt-3 ">
                        <div class="form-group">
                            <label class="text-dark">State Name <span class="text-danger"> *</span></label>
                            <select class="form-control selectForm select_searchBox" style="width: 100%;">
                                <option selected>UP</option>
                                <option>ABC</option>
                            </select>
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

    <!--  city edit  -->
    <div class="modal fade parentModal" id="city_edit" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit City</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 ">
                        <div class="form-group">
                            <label class="text-dark">Name <span class="text-danger"> *</span></label>
                            <input type="text" placeholder="Name" class="form-control typeText" required>
                        </div>
                    </div>
                    <div class="col-12 mt-3 ">
                        <div class="form-group">
                            <label class="text-dark">State Name <span class="text-danger"> *</span></label>
                            <select class="form-control selectForm select_searchBox" style="width: 100%;">
                                <option selected>UP</option>
                                <option>ABC</option>
                            </select>
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

            $('.select_searchBox').select2({
                allowClear: true
            });

            $('#city_add, #city_edit, #state_add, #state_edit').on('shown.bs.modal', function() {
                $(this).find('.select_searchBox').select2({
                    dropdownParent: $(this),
                    allowClear: true
                });
            });
        });
    </script>
@endsection
@endsection
