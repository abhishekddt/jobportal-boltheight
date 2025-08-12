@extends('layouts.backend.main')

@section('main-section')

    <!--- page wrapper section starts-->
    <div class="page-wrapper">
    
      <div class="page-titles">
        <div class="row">
          <div class="col-lg-8 col-md-6 col-12 align-self-center">
            <h4 class="text-muted mb-0 fw-normal">Welcome</h4>
            <h1 class="mb-0 fw-bold">Dashboard</h1>
          </div>
          <div class="
                col-lg-4 col-md-6
                d-none d-md-flex
                align-items-center
                justify-content-end
              "> 
            
          </div>
        </div>
      </div> 

      <div class="container-fluid">
        <!-- row -->
        <div class="row"> 
           <div class="col-md-4 col-sm-6 col-12">
                <div class="card">
                    <a href="pages/condidates.html">
                         <div class="card-body d-flex  justify-content-between align-items-center">
                              <span class="btn btn-xl btnlights btn-circle d-flex align-items-center justify-content-center">
                                <i class="ri-group-line"></i>
                              </span>
                                <div class="d-flex justify-content-end">
                                    <span>
                                        <h1 class="mt-3 pt-1 text-end dashboardText"> 43  </h1>
                                        <h6 class="text-muted mb-0 fw-normal">Total Active Condidates</h6>
                                    </span>
                                </div>
                          </div>
                    </a> 
                 </div>
           </div>

           <div class="col-md-4 col-sm-6 col-12">
                <div class="card">
                    <a href="pages/employers.html">
                         <div class="card-body d-flex  justify-content-between align-items-center">
                              <span class="btn btn-xl btnlights btn-circle d-flex align-items-center justify-content-center">
                               <i class="ri-user-6-line"></i>
                              </span>
                                <div class="d-flex justify-content-end">
                                    <span>
                                        <h1 class="mt-3 pt-1 text-end dashboardText"> 343  </h1>
                                        <h6 class="text-muted mb-0 fw-normal">Total Active Employers</h6>
                                    </span>
                                </div>
                          </div>
                    </a> 
                 </div>
           </div>

            <div class="col-md-4 col-sm-6 col-12">
                <div class="card">
                    <a href="pages/jobs.html">
                         <div class="card-body d-flex  justify-content-between align-items-center">
                              <span class="btn btn-xl btnlights btn-circle d-flex align-items-center justify-content-center">
                                  <i class="ri-shape-line"></i>
                              </span>
                                <div class="d-flex justify-content-end">
                                    <span>
                                        <h1 class="mt-3 pt-1 text-end dashboardText"> 533  </h1>
                                        <h6 class="text-muted mb-0 fw-normal">Total Active Jobs</h6>
                                    </span>
                                </div>
                          </div>
                    </a> 
                 </div>
           </div>
        </div> 
      </div>
 
    </div>
    <!--- page wrapper section end-->
  </div>

  @section('javascript-section')

  @endsection
@endsection