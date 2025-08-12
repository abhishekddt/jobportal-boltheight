@extends('layouts.backend.main')
@section('main-section')
    <div class="page-wrapper">
      <div class="page-titles">
          <div class="row"> 
            <div class="col-8 align-self-center">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                  <li class="breadcrumb-item">
                    <a href="{{ route('backend.dashboard') }}" class="link"><i class="ri-home-3-line fs-5"></i></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                     Admin
                  </li>
                </ol>
                <h3 class="mb-0 fw-bold">New Admin</h3>
              </nav> 
            </div>  
            <div class="col-4 d-flex align-items-center justify-content-end">
              <a href="admins.html" class="btn btn-sm d-flex align-items-center ms-3 addButton">
                <i class="ri-arrow-go-back-line"></i>   Back
              </a>
            </div>
          </div> 
      </div>
      <div class="container-fluid"> 
        <div class="row">
            <div class="col-12">
                <form id="submit_new_admin">
                    <div class="card borderRadius">  
                        <div class="card-body p-3"> 
                                <div class="row formselector">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group"> 
                                            <label class="text-dark">First Name <span class="text-danger"> *</span></label>
                                            <input type="text" placeholder="First Name" class="form-control typeText" required > 
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group"> 
                                            <label class="text-dark">Last Name <span class="text-danger"> *</span></label>
                                            <input type="text" placeholder="Last Name" class="form-control typeText" required > 
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group"> 
                                            <label class="text-dark">Email<span class="text-danger"> *</span></label>
                                            <input type="email" placeholder="Email" class="form-control" required id="admin_email"> 
                                        </div>
                                    </div> 
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group"> 
                                            <label class="text-dark">Phone<span class="text-danger"> *</span></label>
                                            <input type="number" placeholder="Phone Number" class="form-control typeNumber" required id="admin_phone"> 
                                        </div>
                                    </div> 
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group"> 
                                            <label class="text-dark">Password <span class="text-danger"> *</span></label>
                                            <input type="password" placeholder="Password" class="form-control typePassword" required id="admin_password"> 
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group"> 
                                            <label class="text-dark">Confirm Password <span class="text-danger"> *</span></label>
                                            <input type="password" placeholder="Confirm Password:" class="form-control typePassword" required id="admin_confirm_password"> 
                                        </div>
                                    </div>  
                                </div>
                                <div class="submitBtn mt-5 d-flex justify-content-end gap-3"> 
                                    <button type="submit" class="btn btnBg text-white">Submit</button>
                                    <button type="button" class="btn btnBg text-white" >Cancel</button>
                                </div>
                        </div>  
                    </div>  
                </form>
            </div>
        </div>
      </div>
    </div> 
  </div> 
  @section('javascript-section')
  @endsection
@endsection