<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ url('assets/frontend/styles.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/frontend/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

    {{-- select 2 year --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @routes
    @if (config('app.env') == 'local')
        @vite(['resources/js/app.js'])
    @else
        <script src="{{ asset('build/assets/app-3227c578.js') }}" defer></script>
    @endif
</head>

<body>

    <header class="condidate_header  bg-white sticky-top">
        <nav class="">
            <div class="container d-flex align-items-center">
                <a class="navbar-brand company_logo" href="{{ route('frontend.home') }}">
                    <img src="{{ url('assets/frontend/bolt-heights-new.jpg') }}" style="max-width: 180px;">
                </a>

                <div class="nav_list w-100 d-flex justify-content-between align-items-center">
                    <div class="navmenu d-flex gap-5 align-items-center">
                        <ul class="job_list">
                            <li>
                                <a href="{{ route('jobs') }}">Jobs</a>
                                <span class="nottifications bg-danger"><span
                                        class="d-flex justify-content-center align-items-center">5</span>
                            </li>
                        </ul>

                        <div class="positionrelative_job" id="job_search">
                            <div class="d-flex search_job_element">
                                <input type="text" class="w-100 typeText" placeholder="Search jobs here..">
                                <button class="search_job">
                                    <i class="ri-search-line"></i>
                                </button>
                            </div>

                            <span class="search_icons" id="close_seach">
                                <i class="ri-close-line"></i>
                            </span>
                        </div>

                    </div>
                    <div class="profileMenu d-flex align-items-center gap-3">
                        <span class="search_icons" id="job_search_btn">
                            <i class="ri-search-line"></i>
                        </span>
                        <div class="candidate_element">
                            <button class="candidate_profile d-flex align-items-center gap-3" data-bs-toggle="offcanvas"
                                data-bs-target="#profileSideBar" aria-controls="profileSideBar">
                                <span><i class="ri-menu-3-line"></i></span>
                                <img src="{{ optional($candidate)->profile_image
                                    ? asset('storage/' . optional($candidate)->profile_image)
                                    : asset('assets/default_user.webp') }}"
                                    class="candidate_img" alt="user img">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="profileSideBar"
                aria-labelledby="profileSideBarLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body p-4">
                    <div class="sider_profile d-flex align-items-center">
                        <a href="javascript:void(0)">
                            <img src="{{ optional($candidate)->profile_image
                                ? asset('storage/' . optional($candidate)->profile_image)
                                : asset('assets/default_user.webp') }}"
                                class="user_profile" alt="user profile">
                        </a>

                        <div class="profile_edit">
                            <h2 class="candidateName mb-0">{{ Auth::user()->name ?? '' }}</h2>
                            @if (isset($employmenthome))
                                <p class="designations_profile mb-1 p-0">
                                    {{ $employmenthome->job_title }}
                                </p>
                            @else
                                <p class="designations_profile mb-1 p-0">No employment record</p>
                            @endif

                            <a href="{{ route('frontend.user-profile') }}"
                                class="profileEdit text-decoration-none">View & Update Profile</a>
                        </div>
                    </div>
                    <hr>
                    {{-- <div class="card p-3" style="background: rgb(236 245 255 / 50%);">
                        <div class="row">
                            <div class="col-6">
                                <div class="actions_">
                                    <h5 class="recruterActions text-center">
                                        Search appearances
                                    </h5>
                                    <a href="" class="d-flex text-decoration-none justify-content-center">
                                        <span> 7161</span>
                                        <i class="ri-arrow-right-s-line"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="actions_">
                                    <h5 class="recruterActions text-center">
                                        Recruiter actions
                                    </h5>
                                    <a href=""
                                        class="d-flex text-center text-decoration-none d-flex justify-content-center">
                                        <span>71 </span><i class="ri-arrow-right-s-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="mt-3">
                        <ul class="list-unstyled">
                            <li class="profile_list">
                                <a href="{{ route('frontend.user-profile') }}"
                                    class="d-flex gap-3 text-decoration-none text-dark">
                                    <i class="ri-settings-2-line"></i>
                                    <span>Settings</span>
                                </a>
                            </li>

                            <li class="profile_list">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        class="d-flex gap-3 text-decoration-none text-dark"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        <i class="ri-logout-circle-line"></i>
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>


                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </section>
