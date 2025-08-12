<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ url('assets/backend/css/styles.css') }}">
  <link rel="stylesheet" href="{{ url('assets/frontend/styles.css') }}">
  <!-- Favicon icon -->
  <link href="{{ url('assets/backend/dist/css/style.min.css') }}" rel="stylesheet" />

  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"
/>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<style>
    *{
      padding: 0px;
      margin: 0px;
      box-sizing: border-box;
        font-family: "Jost", sans-serif;
    }
</style>
</head>
<body > 
  <section>

    <div class="row" style="height: 100vh; overflow: hidden;">
        <div class="col-md-6 h-100" style="background-color: #131D4F;">
            <div class="w-100 h-100 d-flex justify-content-center align-items-center" >
                <!-- <h1 class="text-white" style="font-size: 50px; font-weight: 500;">Login <i class="ri-arrow-right-circle-line"></i></h1> -->
            </div>
        </div>
        <div class="col-md-6 h-100 d-flex justify-content-center align-items-center">
              <div class="formsiez">
                  <div class="p-4 rounded ">

                    <!---login start-->
                    <div id="login">
                      <div class="logo">
                        <h3 class="box-title mb-3">Log In</h3>
                      </div>
                      <!-- Form -->
                      <div class="row"> 
                        <div class="col-12">
                          <form class="form-horizontal mt-3 form-material" id="loginform" method="POST" action="{{ route('backend.login_store') }}">
                            @csrf
                            <div class="form-group mb-3">
                              <div class="logincontrol">
                                  <input class="form-control logininput" type="email" name="email" required placeholder="Email"> 
                              </div>
                            </div>
                            <div class="mb-4 logincontrol"> 
                                <input class="form-control logininput " type="password" name="password" required placeholder="Password"> 
                            </div>

                            <div class="form-group"> 
                              <div class="d-flex">
                                <div class="checkbox checkbox-info pt-0">
                                  <input id="checkbox-signup" type="checkbox" class="material-inputs chk-col-indigo">
                                  <label for="checkbox-signup"> Remember me </label>
                                </div>
                                <div class="ms-auto">
                                  <p class="d-flex align-items-center link font-weight-medium forgetopen "><i class="ri-lock-line me-1 fs-4"></i> Forgot pwd?</p>
                                </div>
                              </div> 

                            </div>

                            <div class="form-group text-center mt-4 mb-3">
                              <div class="col-xs-12">
                                <a href="index.html">
                                  <button class=" btn btn-info d-block  w-100 waves-effect waves-light text-white" type="submit" >
                                    Log In
                                  </button>
                                </a>
                                 
                              </div> 
                              
                            </div> 

                          </form>
                             <div class="mt-3 d-flex justify-content-end "> <a href="candidate_dashboard/login.html" class="text-white">Login Condidates</a></div>
                        </div>
                      </div>
                    </div>
                    <!---login end-->

                    <!---forget form start-->
                    <div id="forget" style="display: none;">
                       <div class="logo">
                          <h3 class="text-white font-weight-medium mb-3">Recover Password</h3>
                         <span class="text- text-white">Enter your Email and instructions will be sent to you!</span>
                      </div>
                      <div class="row mt-3 form-material">
                        <form class="col-12" action="index.html">

                          <div class="form-group row">
                            <div class="col-12">
                              <input class="form-control logininput" type="email" required="" placeholder="Your email">
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-12">
                              <button class="btn d-block w-100 btn-info text-uppercase" type="submit" name="action">
                                Reset
                              </button>
                            </div>
                          </div>
                          <div class="form-group mb-0 mt-4">
                            <div class="col-sm-12 justify-content-center d-flex">
                              <p>
                                You have an account?
                                 <p class="text-info font-weight-medium ms-1 forgetopen">Log in</p>
                              </p>
                            </div>
                            
                          </div>
                        </form>
                      </div>
                    </div>
                    <!---forget form end-->
                  </div>
              </div>
        </div>
    </div>      

   
  </section>

  <script src="{{ url('assets/libs/jquery/dist/jquery.min.js') }}"></script>
   
  <!-- <script src="{{ url('assets/backend/dist/') }}"></script> -->
  <script src="{{ url('assets/frontend/script/script.js') }}"></script>

</body>
</html>