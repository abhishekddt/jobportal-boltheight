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
                      Jobs
                  </li>
                </ol>
                <h3 class="mb-0 fw-bold">New Jobs</h3>
              </nav> 
            </div>  

             <div class="col-4 d-flex align-items-center justify-content-end">
              <a href="javascript:void(0)" onclick="history.back();" class="btn btn-sm d-flex align-items-center ms-3 addButton">
                <i class="ri-arrow-go-back-line"></i>   Back
              </a>
            </div>
          </div>
      </div>  
      <div class="container-fluid"> 
        <div class="row">
            <div class="col-12">
                <form id="job_submit_form">
                    <div class="card borderRadius"> 
                        <div class="card-body p-3">  
                                <div class="row formselector">
                                     <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                        <div class="form-group"> 
                                             <label class="text-dark"> Company Name <span class="text-danger"> *</span></label> 
                                             <select class="form-control selectForm select_searchBox"   style="width: 100%;">
                                                      <option selected>Select Company Name</option>
                                                      <option >A</option>  
                                                      <option >B</option>  
                                             </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                        <div class="form-group"> 
                                            <label class="text-dark">Job Title <span class="text-danger"> *</span></label>
                                            <input type="text" placeholder="Job Title" class="form-control typeText" required > 
                                        </div>
                                    </div>  
 
                                      <div class="col-md-4 mb-4">
                                            <div class="form-group"> 
                                                <label class="text-dark">Job Type <span class="text-danger"> *</span></label> 
                                                <select class="form-control selectForm select_searchBox"   style="width: 100%;">
                                                        <option selected>Select Job Type</option>
                                                        <option >Architecture and Engineering</option>    
                                                </select>
                                            </div>
                                       </div>

                                       <div class="col-md-4 mb-4">
                                            <div class="form-group"> 
                                                <label class="text-dark">Job Category <span class="text-danger"> *</span></label> 
                                                <select class="form-control selectForm select_searchBox"  style="width: 100%;">
                                                        <option selected>Select Job Category </option>
                                                        <option >Actuaries</option>    
                                                </select>
                                            </div>
                                       </div> 

                                    <div class="col-md-4 mb-4">
                                         <div class="form-group select2form"> 
                                            <label class="text-dark">Job Skill</label> 
                                            <div class="d-flex">
                                                <select class="select2 form-control block" multiple="multiple" style="width: 100%">
                                                  <option>Computer Skill</option> 
                                                </select>
                                                 <button type="button" class="input-group-text"
                                                  style="border-radius: 0px;" data-bs-toggle="modal" data-bs-target="#job_add"><i class="ri-add-line"></i></button>
                                            </div>
                                        </div>
                                    </div> 

                                        <div class="col-md-4 mb-4">
                                            <div class="form-group"> 
                                                <label class="text-dark">Gender <span class="text-danger"> *</span></label> 
                                                <select class="form-control selectForm select_searchBox"  style="width: 100%;">
                                                        <option selected>Select Gender </option>
                                                        <option >Male</option>    
                                                        <option >Female</option>    
                                                        <option >Both</option>    
                                                </select>
                                            </div>
                                       </div> 

                                        <div class="col-md-4 mb-4">
                                            <div class="form-group select2form"> 
                                                <label class="text-dark "  >Languages</label> 
                                                <select class="select2 form-control block" multiple="multiple" style="width: 100%">
                                                    <option>English</option>
                                                    <option>Hindi</option> 
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-4">
                                                <div class="form-group"> 
                                                    <label class="text-dark">Job Expiry Date <span class="text-danger"> *</span></label>
                                                    <input type="date" placeholder="Job Expiry Date" class="form-control" required > 
                                                </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                                <div class="form-group"> 
                                                    <label class="text-dark">Salary From <span class="text-danger"> *</span></label>
                                                    <input type="number" placeholder="Salary From typeNumber" class="form-control" required > 
                                                </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                                <div class="form-group"> 
                                                    <label class="text-dark">Salary To <span class="text-danger"> *</span></label>
                                                    <input type="number" placeholder="Salary To" class="form-control typeNumber" required > 
                                                </div>
                                        </div>
                                         <div class="col-md-4 mb-4">
                                            <div class="form-group"> 
                                                <label class="text-dark">INR <span class="text-danger"> *</span></label> 
                                                <select class="form-control selectForm select_searchBox"  style="width: 100%;">
                                                        <option selected>Select INR </option> 
                                                </select>
                                            </div>
                                       </div> 

                                         <div class="col-md-4 mb-4">
                                            <div class="form-group"> 
                                                <label class="text-dark">Salary Period <span class="text-danger"> *</span></label> 
                                                <select class="form-control selectForm select_searchBox"  style="width: 100%;">
                                                        <option selected>Select Salary Period </option>
                                                        <option>Every Other Week Pay Period </option>
                                                          
                                                </select>
                                            </div>
                                        </div> 

                                        
                                        
                                        <div class="col-md-4 mb-4">
                                            <div class="form-group"> 
                                                <label class="text-dark">Country <span class="text-danger"> *</span></label> 
                                                <select class="form-control selectForm select_searchBox"  style="width: 100%;">
                                                        <option selected>Select Country</option>
                                                        <option selected>India</option>  
                                                        <option >Australia</option>  
                                                        <option >America</option>  
                                                </select>
                                            </div>
                                        </div>
                                      <div class="col-md-4 mb-4">
                                        <div class="form-group"> 
                                             <label class="text-dark">State <span class="text-danger"> *</span></label> 
                                             <select class="form-control selectForm select_searchBox"   style="width: 100%;">
                                                      <option selected>Delhi</option>
                                                      <option >Uttar Pradesh</option>  
                                             </select>
                                        </div>
                                      </div>

                                        <!-- <div class="col-md-4 mb-4">
                                            <div class="form-group"> 
                                                <label class="text-dark">City <span class="text-danger"> *</span></label> 
                                                <select class="form-control selectForm select_searchBox"  style="width: 100%;">
                                                        <option >Delhi</option>
                                                        <option >New Delhi</option>  
                                                </select>
                                            </div>
                                        </div>  -->

                                          <div class="col-md-4 mb-4">
                                              <div class="form-group select2form"> 
                                                  <label class="text-dark "  >City</label> 
                                                  <select class="select2 form-control block" multiple="multiple" style="width: 100%">
                                                      <option>Delhi</option>
                                                      <option>New Delhi</option> 
                                                  </select>
                                              </div>
                                          </div>

                                        <div class="col-md-4 mb-4">
                                            <div class="form-group"> 
                                                <label class="text-dark">Career Level <span class="text-danger"> *</span></label> 
                                                <select class="form-control selectForm select_searchBox"  style="width: 100%;">
                                                        <option selected>Expert</option>
                                                      
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="col-md-4 mb-4">
                                            <div class="form-group"> 
                                                <label class="text-dark">Job Shift <span class="text-danger"> *</span></label> 
                                                <select class="form-control selectForm select_searchBox"  style="width: 100%;">
                                                        <option selected>Day</option>
                                                        <option  >Full Time</option>
                                                      
                                                </select>
                                            </div>
                                        </div> 

                                        <div class="col-md-4 mb-4">
                                            <div class="form-group"> 
                                                <label class="text-dark">Functional Areas <span class="text-danger"> *</span></label> 
                                                <select class="form-control selectForm select_searchBox"  style="width: 100%;">
                                                        <option selected>Abc</option>  
                                                </select>
                                            </div>
                                        </div> 

                                           <div class="col-md-4 mb-4">
                                                <div class="form-group"> 
                                                    <label class="text-dark">Position <span class="text-danger"> *</span></label>
                                                    <input type="text" placeholder="Position" class="form-control typeText" required > 
                                                </div>
                                           </div>

                                         

                                          <div class="row">
                                                  <div class="col-md-6 mb-4">
                                                            <div class="form-group"> 
                                                                <label class="text-dark">Key Responsibilities: <span class="text-danger"> *</span></label>
                                                                <textarea id="editor"  ></textarea>
                                                            </div>
                                                    </div> 

                                                        <div class="col-md-6 mb-4">
                                                            <div class="form-group"> 
                                                                <label class="text-dark">Description: <span class="text-danger"> *</span></label>
                                                                <textarea id="editor2"  ></textarea>
                                                            </div>
                                                    </div> 
                                          </div>

                                       <div class="col-md-4 mb-4">
                                          <div class="form-group"> 
                                              <label class="text-dark" for="title">Job Experience:<span class="text-danger"> *</span></label>
                                               <input class="form-control yearExp" placeholder="Job Experience:"  required type="number">
                                          </div>
                                       </div>

                                      <div class="col-md-6 mb-4">
                                            <div class="row"> 

                                                    <div class="col-md-3">
                                                            <div class="form-group"> 
                                                                <label class="text-dark" for="title">Hide Salary </label>
                                                                  <div class="input-group">
                                                                        <div class="form-check form-switch">
                                                                           <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked style="width: 40px;"> 
                                                                        </div>
                                                                 </div>
                                                             </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                            <div class="form-group"> 
                                                                <label class="text-dark" for="title">Is Freelance </label>
                                                                  <div class="input-group">
                                                                        <div class="form-check form-switch">
                                                                           <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked style="width: 40px;"> 
                                                                        </div>
                                                                 </div>
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
  @endsection
@endsection