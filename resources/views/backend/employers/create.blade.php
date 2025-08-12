@extends('layouts.backend.main')
@section('main-section')


 <!--- page wrapper section starts-->
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
                     Employers
                  </li>
                </ol>
                <h3 class="mb-0 fw-bold">New Employers</h3>
              </nav> 
            </div> 
            <div class="col-4 d-flex align-items-center justify-content-end">
              <a href="javascript:void(0)" onclick="history.back()" class="btn btn-sm d-flex align-items-center ms-3 addButton">
                <i class="ri-arrow-go-back-line"></i>   Back
              </a>
            </div>
          </div>
      </div>
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form>
                    <div class="card borderRadius"> 
                        <div class="card-body p-3"> 
                                <div class="row formselector">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group"> 
                                            <label class="text-dark">Employer Name <span class="text-danger"> *</span></label>
                                            <input type="text" placeholder="Employer Name" class="form-control typeText" required > 
                                        </div>
                                    </div> 
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group"> 
                                            <label class="text-dark"  >Email<span class="text-danger"> *</span></label>
                                            <input type="email" placeholder="Email" class="form-control" required > 
                                        </div>
                                    </div> 
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group"> 
                                            <label class="text-dark">Phone<span class="text-danger"> *</span></label>
                                            <input type="number" placeholder="Phone Number" class="form-control typeNumber" required > 
                                        </div>
                                    </div> 
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group"> 
                                            <label class="text-dark" >CEO Name <span class="text-danger"> *</span></label>
                                            <input type="text" placeholder="CEO Name" class="form-control typeText" name="ceo" required > 
                                        </div>
                                    </div> 
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group"> 
                                            <label class="text-dark">Password <span class="text-danger"> *</span></label>
                                            <input type="password" placeholder="Password" class="form-control typePassword" required > 
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group"> 
                                            <label class="text-dark">Confirm Password <span class="text-danger"> *</span></label>
                                            <input type="password" placeholder="Confirm Password:" class="form-control typePassword" required > 
                                            <p class="m-0 text-danger fs-3" style="display: none;">Check your password</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group"> 
                                             <label class="text-dark">Industry <span class="text-danger"> *</span></label> 
                                             <select class="form-control selectForm" id="select2-with-Industry" style="width: 100%;">
                                                      <option  selected disabled>Advertising</option>
                                                      <option value="NV">Marketing</option> 
                                                      <option value="WA">Washington</option>
                                             </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group"> 
                                             <label class="text-dark">Ownership Type <span class="text-danger"> *</span></label> 
                                             <select class="form-control selectForm" id="select2-with-Ownership" style="width: 100%;">
                                                      <option selected disabled>Select Ownership Type</option>
                                                      <option value="NV">Marketing</option> 
                                                      <option value="WA">Washington</option>
                                             </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group"> 
                                             <label class="text-dark">Country <span class="text-danger"> *</span></label> 
                                             <select class="form-control selectForm" id="select2-with-Country" style="width: 100%;">
                                                      <option selected>India</option>
                                                      <option >Japan</option> 
                                                      <option >Cuba</option>
                                             </select>
                                        </div>
                                    </div>
                                      <div class="col-md-4 mt-3">
                                        <div class="form-group"> 
                                             <label class="text-dark">State <span class="text-danger"> *</span></label> 
                                             <select class="form-control selectForm" id="select2-with-State" style="width: 100%;">
                                                      <option selected>Delhi</option>
                                                      <option >Uttar Pradesh</option>  
                                             </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group"> 
                                             <label class="text-dark">City <span class="text-danger"> *</span></label> 
                                             <select class="form-control selectForm" id="select2-with-City" style="width: 100%;">
                                                      <option selected>Delhi</option>
                                                      <option >New Delhi</option>  
                                             </select>
                                        </div>
                                    </div> 
                                     <div class="col-md-4 mt-3">
                                        <div class="form-group"> 
                                             <label class="text-dark">Size <span class="text-danger"> *</span></label> 
                                             <select class="form-control selectForm" id="select2-with-Size" style="width: 100%;">
                                                      <option selected>Select Size</option>
                                                      <option >11 - 20</option>  
                                                      <option >20 - 40</option>  
                                             </select>
                                        </div>
                                     </div> 
                                      <div class="col-md-4 mt-3">
                                        <div class="form-group"> 
                                             <label class="text-dark">Established Year <span class="text-danger"> *</span></label> 
                                             <select class="form-control selectForm" id="select2-with-Established_year" style="width: 100%;">
                                                      <option selected>Select Size</option>
                                                      <option >2024</option>  
                                                      <option >2025</option>  
                                             </select>
                                        </div>
                                     </div>   
                                     <div class="col-md-4 mt-3">
                                        <div class="form-group"> 
                                              <label class="text-dark">Location <span class="text-danger"> *</span></label> 
                                              <input type="text" placeholder="Location" class="form-control" required > 
                                        </div>
                                     </div> 
                                      <div class="col-md-4 mt-3">
                                        <div class="form-group"> 
                                              <label class="text-dark">2nd Office Location <span class="text-danger"> *</span></label> 
                                              <input type="text" placeholder="2nd Office Location" class="form-control" required > 
                                        </div>
                                     </div>  
                                      <div class="col-12 mt-3">
                                        <div class="form-group"> 
                                              <label class="text-dark">Employer Details <span class="text-danger"> *</span></label> 
                                               <textarea id="editor"  ></textarea>
                                        </div>
                                     </div>   
                                      <div class="col-md-6 mt-3">
                                        <div class="form-group"> 
                                              <label class="text-dark">Website <span class="text-danger"> *</span></label> 
                                              <input type="text" placeholder="Website" class="form-control" required > 
                                        </div>
                                     </div>  
                                     <div class="col-md-6 mt-3">
                                          <div class="form-group"> 
                                              <label class="text-dark" for="title">Facebook URL<span class="text-danger"> *</span></label>
                                              <div class="input-group">
                                                  <span class="input-grouptext"><i class="ri-facebook-line"></i></span>
                                                  <input class="form-control " placeholder="https://www.facebook.com/" name="facbook" required type="text"> 
                                              </div>
                                          </div>
                                     </div> 
                                      <div class="col-md-6 mt-3">
                                          <div class="form-group"> 
                                              <label class="text-dark" for="title">Linkedin URL<span class="text-danger"> *</span></label>
                                              <div class="input-group">
                                                  <span class="input-grouptext"><i class="ri-linkedin-line"></i></span>
                                                  <input class="form-control " placeholder="https://in.linkedin.com/" name="linkdin" required type="text"> 
                                              </div>
                                          </div>
                                     </div> 
                                       <div class="col-md-6 mt-3">
                                          <div class="form-group"> 
                                              <label class="text-dark" for="title">Status </label>
                                              <div class="input-group">
                                                   <div class="form-check form-switch">
                                                      <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked style="width: 40px;"> 
                                                    </div>
                                              </div>
                                          </div>
                                     </div>  
                                </div>  
                                <div class="submitBtn mt-5 d-flex justify-content-end gap-3"> 
                                    <button type="submit" class="btn btnBg text-white">Submit</button>
                                    <button type="button" class="btn btnBg text-white">Cancel</button>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    <script> 
        $(document).ready(function () {  
            $('#select2-with-Industry, #select2-with-Ownership, #select2-with-Country, #select2-with-State, #select2-with-City, #select2-with-Size, #select2-with-Established_year').select2({ 
                allowClear: true
            });  
        }) 
        ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        }); 
    </script>
  @endsection
@endsection