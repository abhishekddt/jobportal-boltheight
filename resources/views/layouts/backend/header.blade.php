<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ url('assets/backend/css/styles.css') }}">
  <!-- Favicon icon -->
  <link rel="icon" href="{{ url('assets/backend/images//icon/armylogo.PNG') }} " type="image/x-icon"> 
  <!-- Custom CSS -->
  <link href="{{ url('assets/backend/dist/css/style.min.css') }} " rel="stylesheet" /> 
  <!--- select 2 css link-->
  <link href="{{ url('assets/backend/libs/select2/select2.min.css') }} " rel="stylesheet">
  <!-- data table css-->
     <!--- data tables cdn-->
 <link href="{{ url('assets/backend/libs/dataTable/responsive.dataTables.min.css') }}" rel="stylesheet">
  @routes
  @if (config('app.env') == 'local')
      @vite(['resources/js/app.js'])
  @else 
      <script src="{{ asset('build/assets/app-3227c578.js') }}" defer></script>
  @endif

</head>
<body>
  <div id="main-wrapper">
    <header class="topbar">
      <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
          <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ri-close-line ri-menu-2-line fs-6"></i></a> 
          <a class="navbar-brand" href="#"> 
            <b class="logo-icon wdth"><img  src="{{ url('assets/backend/images/logo.jpg') }}" alt="homepage" class="dark-logo bgmini"/> </b>  
            <span class="logo-text">
            <!-- <img src="{{ url('assets/backend/images/icon/armylogo.PNG') }}" alt="homepage" class="dark-logo logodashboard "/>  -->
            <!-- <img src="{{ url('assets/backend/images/logo.jpg') }}" class="light-logo" alt="homepage" />   -->
            </span>
          </a>
          <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
            data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation"><i class="ri-more-line fs-6"></i></a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent"> 
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link sidebartoggler d-none d-md-block" href="javascript:void(0)"><i
                  data-feather="menu"></i></a>
            </li>
            <li class="nav-item search-box">
              <a class="nav-link" href="javascript:void(0)">
                <i data-feather="search"></i>
              </a>
              <form class="app-search position-absolute">
                <input type="text" class="form-control border-0" placeholder="Search &amp; enter" />
                <a class="srh-btn"><i data-feather="x-circle" class="feather-sm text-muted"></i></a>
              </form>
            </li>
          </ul> 
          <ul class="navbar-nav">
            <li class="nav-item dropdown profile-dropdown">
              <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"> 
                  @if(Auth::user()->profile != '')
                  <img src="{{ url('assets/upload/users').'/'.Auth::user()->profile }}" alt="user" width="30" class="profile-pic rounded-circle"  id="output"/>
                  @else
                    <img src="{{ url('assets/backend/images/default_user.webp') }}" alt="user" width="30" class="profile-pic rounded-circle"  id="output"/>
                  @endif 
                <div class="d-none d-md-flex">
                  <span class="ms-2">Hi,
                    <span class="text-dark fw-bold">{{ Auth::user()->name ?? '' }}</span></span>
                  <span>
                    <i data-feather="chevron-down" class="feather-sm"></i>
                  </span>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end mailbox  dropdown-menu-animate-up ">
                <ul class="list-style-none">
                  <li class="p-30 pb-2">
                    <div class="rounded-top d-flex align-items-center">
                      <h3 class="card-title mb-0">User Profile</h3>
                      <div class="ms-auto">
                        <a href="" class="link py-0">
                          <i data-feather="x-circle"></i>
                        </a>
                      </div>
                    </div>  
                    <div class="d-flex align-items-center mt-4  pt-3 pb-4  border-bottom">
                    @if(Auth::user()->profile != '')
                      <img src="{{ url('assets/upload/users').'/'.Auth::user()->profile }}" alt="user" width="90" class="rounded-circle" /> 
                    @else 
                      <img src="{{ url('assets/backend/images/default_user.webp') }}" alt="user" width="90" class="rounded-circle" />
                    @endif
                      <div class="ms-4">
                        <h4 class="mb-0">{{ Auth::user()->name ?? '' }}</h4>
                        <span class="text-muted">Super Admin</span>
                        <p class="text-muted mb-0 mt-1"><i data-feather="mail" class="feather-sm me-1"></i>{{ Auth::user()->email ?? '' }}</p>
                      </div>
                    </div>
                  </li>

                  <li class="p-30 pt-0">
                    <div class="message-center message-body position-relative" style="height: 110px">
                      <a href="pages/profile.html" class=" message-item  px-2 d-flex align-items-center border-bottom  py-3 ">
                        <span class="btn btn-light-info btn-rounded-lg text-info">
                        <i class="ri-user-line"></i>
                        </span>
                        <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                          <h5 class="message-title mb-0  mt-1 fs-4 font-weight-medium ">
                            My Profile
                          </h5>
                          <span class="fs-3 text-nowrap d-block time text-truncate fw-normal mt-1 text-muted">Account Settings</span>
                        </div>
                      </a>
                    </div>
                    <div class="mt-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf 
                            <x-dropdown-link :href="route('logout')" class="btn btn-info text-white text-center"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form> 
                    </div>
                  </li>
                </ul>
              </div>

            </li>
          </ul>
        </div>
      </nav>
    </header>

    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
          <ul id="sidebarnav"> 
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('backend.dashboard') }}" aria-expanded="false">
                <i class="ri-dashboard-line"></i>
                <span class="hide-menu">Dashboards</span>
              </a>
            </li>

              <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('backend.employers.index') }}" aria-expanded="false">
                    <i class="ri-group-line"></i> 
                    <span class="hide-menu">Employers</span>
                  </a>
              </li>

               <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('backend.admin.all_admins') }}" aria-expanded="false">
                    <i class="ri-user-settings-line"></i>
                    <span class="hide-menu">Admins</span>
                  </a>
              </li>

                <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('backend.condidate_list') }}" aria-expanded="false">
                      <i class="ri-creative-commons-by-line"></i>
                      <span class="hide-menu">Condidates</span>
                  </a>
                </li>

                 <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('backend.jobs.index') }}" aria-expanded="false">
                      <i class="ri-projector-line"></i>
                      <span class="hide-menu">Jobs</span>
                    </a>
                 </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('backend.countries.index') }}" aria-expanded="false">
                      <i class="ri-global-line"></i>
                      <span class="hide-menu">Countries</span>
                    </a>
                 </li>

                 <!-- <li class="sidebar-item">
                      <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('backend.countries.index') }}" aria-expanded="false">
                        <i class="ri-notification-2-line"></i> 
                        <span class="hide-menu">Countries</span>
                      </a>
                   </li> -->

                 <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('backend.general.index') }}" aria-expanded="false">
                      <i class="ri-layout-bottom-2-line"></i>
                      <span class="hide-menu">General</span>
                    </a>
                 </li>

                 <!-- <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pages/condidates.html" aria-expanded="false">
                      <i class="ri-hard-drive-2-line"></i> 
                      <span class="hide-menu">CMS</span>
                    </a>
                 </li> -->

              <!-- <li class="sidebar-item">
                  <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false" >
                    <i data-feather="inbox"></i>
                    <span class="hide-menu">Manage Hotels</span>
                  </a>
                  <ul aria-expanded="false" class="collapse first-level submenus">
                      <li class="sidebar-item">
                        <a href="pages/amenities.html" class="sidebar-link"><i class="ri-mail-line"></i>
                          <span class="hide-menu"> Amenities </span>
                        </a>
                      </li>  
                  </ul>
              </li> -->  
               

              <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="login.html" aria-expanded="false">
                  <i data-feather="log-out"></i>
                  <span class="hide-menu">Log Out</span></a>
              </li>

          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div> 
    </aside>
 
