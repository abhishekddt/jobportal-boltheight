@extends('layouts.frontend.main')

@section('main-section')
    <section>
        <div class="container">
            <div class="row mt-4">
                <div class="col-lg-3 home_profile">
                    <div class="card sticky-top" style="top: 70px;">
                        <div class="card-body">
                            <div class="profile_image d-flex justify-content-center">
                                @if (Auth::user()->profile != '')
                                    <img src="{{ url('assets/upload/users') . '/' . Auth::user()->profile }}"
                                        class="candidate_img" alt="user img">
                                @else
                                    <img src="{{ url('assets/default_user.webp') }}" class="candidate_img" alt="user img">
                                @endif
                            </div>
                            <h3 class="text-center candidateName pt-3 pb-1 mb-0">{{ Auth::user()->name ?? '' }}</h3>
                            <p class="text-center designations m-0 p-0">Front End Developer</p>
                            <p class="text-uppercase text-center pt-2 company mb-1">ddt software & ecommerce pvt ltd</p>
                            <p class="online_day text-center">Last update 10d ago</p>
                            <div class="d-flex justify-content-center ">
                                <div class="d-flex justify-content-center">
                                    @if (Auth::user()->getCondidateDetail && Auth::user()->getCondidateDetail->field === 'aviation')
                                        <a class="view_profile" href="{{ route('frontend.aviation') }}">View profile</a>
                                    @else
                                        <a class="view_profile" href="{{ route('frontend.user-profile') }}">View profile</a>
                                    @endif
                                </div>
                            </div>
                            <div class="profile_proformance">
                                <h3 class="text-center candidateName pt-3 pb-1 mb-0">{{ Auth::user()->name ?? '' }}</h3>
                                <div class="card p-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="actions_">
                                                <h5 class="recruterActions">
                                                    Search appearances
                                                </h5>
                                                <a href="" class="d-flex text-decoration-none">
                                                    <span> 7161</span>
                                                    <i class="ri-arrow-right-s-line"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="actions_">
                                                <h5 class="recruterActions">
                                                    Recruiter <br>actions
                                                </h5>
                                                <a href="" class="d-flex text-decoration-none">
                                                    <span> 71</span>
                                                    <i class="ri-arrow-right-s-line"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="headings">Recommended Jobs for you</h3>
                                <a href="{{ route('jobs') }}" class="linktext">View all</a>
                            </div>
                            <div class="tabs_job">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-profile" type="button" role="tab"
                                            aria-controls="pills-profile" aria-selected="true">Profile (21)</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-tab2-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-tab2" type="button" role="tab"
                                            aria-controls="pills-tab2" aria-selected="false">Applies (124)</button>
                                    </li>
                                </ul>

                                <div class="tab-content" id="pills-tabContent">

                                    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                                        aria-labelledby="pills-profile-tab" tabindex="0">
                                        <div class="profiels">

                                            <div class="slicky_elements">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <a href="{{ route('frontend.apply-jobs') }}"
                                                            class="text-decoration-none text-black">
                                                            <div class="companys d-flex justify-content-between">
                                                                <img class="campany_logo" src="logoipsums.png">
                                                                <p class="online_day text-end">10d ago</p>
                                                            </div>
                                                            <h3 class="sub_headings mt-3">Hiring For Gener..</h3>
                                                            <div
                                                                class="d-flex justify-content-between align-content-center flex-wrap">
                                                                <span class="company_nams">WNS Holding...</span>
                                                                <span class="company_reviews"><i class="ri-star-fill"></i>
                                                                    4.5</span>
                                                            </div>
                                                            <p class="job_address m-0 mt-2"><i class="ri-map-pin-line"></i>
                                                                Delhi..</p>

                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slicky_elements">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <a href="{{ route('frontend.apply-jobs') }}"
                                                            class="text-decoration-none text-black">
                                                            <div class="companys d-flex justify-content-between">
                                                                <img class="campany_logo" src="logoipsums.png">
                                                                <p class="online_day text-end">10d ago</p>
                                                            </div>
                                                            <h3 class="sub_headings mt-3">Hiring For Gener..</h3>
                                                            <div
                                                                class="d-flex justify-content-between align-content-center flex-wrap">
                                                                <span class="company_nams">WNS Holding...</span>
                                                                <span class="company_reviews"><i class="ri-star-fill"></i>
                                                                    4.5</span>
                                                            </div>
                                                            <p class="job_address m-0 mt-2"><i
                                                                    class="ri-map-pin-line"></i> Delhi..</p>

                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slicky_elements">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <a href="{{ route('frontend.apply-jobs') }}"
                                                            class="text-decoration-none text-black">
                                                            <div class="companys d-flex justify-content-between">
                                                                <img class="campany_logo" src="logoipsums.png">
                                                                <p class="online_day text-end">10d ago</p>
                                                            </div>
                                                            <h3 class="sub_headings mt-3">Hiring For Gener..</h3>
                                                            <div
                                                                class="d-flex justify-content-between align-content-center flex-wrap">
                                                                <span class="company_nams">WNS Holding...</span>
                                                                <span class="company_reviews"><i class="ri-star-fill"></i>
                                                                    4.5</span>
                                                            </div>
                                                            <p class="job_address m-0 mt-2"><i
                                                                    class="ri-map-pin-line"></i> Delhi..</p>

                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slicky_elements">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <a href="{{ route('frontend.apply-jobs') }}"
                                                            class="text-decoration-none text-black">
                                                            <div class="companys d-flex justify-content-between">
                                                                <img class="campany_logo" src="logoipsums.png">
                                                                <p class="online_day text-end">10d ago</p>
                                                            </div>
                                                            <h3 class="sub_headings mt-3">Hiring For Gener..</h3>
                                                            <div
                                                                class="d-flex justify-content-between align-content-center flex-wrap">
                                                                <span class="company_nams">WNS Holding...</span>
                                                                <span class="company_reviews"><i class="ri-star-fill"></i>
                                                                    4.5</span>
                                                            </div>
                                                            <p class="job_address m-0 mt-2"><i
                                                                    class="ri-map-pin-line"></i> Delhi..</p>

                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="pills-tab2" role="tabpanel"
                                        aria-labelledby="pills-tab2-tab" tabindex="0">

                                        <div class="slicky_elements">
                                            <div class="card">
                                                <div class="card-body">
                                                    <a href="{{ route('frontend.apply-jobs') }}"
                                                        class="text-decoration-none text-black">
                                                        <div class="companys d-flex justify-content-between">
                                                            <img class="campany_logo" src="logoipsums.png">
                                                            <p class="online_day text-end">10d ago</p>
                                                        </div>
                                                        <h3 class="sub_headings mt-3">Hiring For Gener..</h3>
                                                        <div
                                                            class="d-flex justify-content-between align-content-center flex-wrap">
                                                            <span class="company_nams">WNS Holding...</span>
                                                            <span class="company_reviews"><i class="ri-star-fill"></i>
                                                                4.5</span>
                                                        </div>
                                                        <p class="job_address m-0 mt-2"><i class="ri-map-pin-line"></i>
                                                            Delhi..</p>

                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('jobs') }}" class="linktext">View all</a>
                            </div>
                            <div class="view_all_job">
                                <div class="slicky_elements">
                                    <div class="card">
                                        <div class="card-body">
                                            <a href="{{ route('frontend.apply-jobs') }}"
                                                class="text-decoration-none text-black">
                                                <div class="companys d-flex justify-content-between">
                                                    <img class="campany_logo" src="logoipsums.png">
                                                    <p class="online_day text-end">10d ago</p>
                                                </div>
                                                <h3 class="sub_headings mt-3">Front End Developer</h3>
                                                <div class="d-flex justify-content-between align-content-center flex-wrap">
                                                    <span class="company_nams">Lenevo</span>
                                                    <span class="company_reviews"><i class="ri-star-fill"></i> 4.5</span>
                                                </div>
                                                <p class="job_address m-0 mt-2"><i class="ri-map-pin-line"></i> Delhi..
                                                </p>

                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="slicky_elements">
                                    <div class="card">
                                        <div class="card-body">
                                            <a href="{{ route('frontend.apply-jobs') }}"
                                                class="text-decoration-none text-black">
                                                <div class="companys d-flex justify-content-between">
                                                    <img class="campany_logo" src="logoipsums.png">
                                                    <p class="online_day text-end">10d ago</p>
                                                </div>
                                                <h3 class="sub_headings mt-3">Front End Developer</h3>
                                                <div class="d-flex justify-content-between align-content-center flex-wrap">
                                                    <span class="company_nams">Lenevo</span>
                                                    <span class="company_reviews"><i class="ri-star-fill"></i> 4.5</span>
                                                </div>
                                                <p class="job_address m-0 mt-2"><i class="ri-map-pin-line"></i> Delhi..
                                                </p>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-2">
                        <div class="card-body">
                            <!----->
                            <div class="card mb-2">
                                <div class="card-body">
                                    <a href="{{ route('frontend.apply-jobs') }}" class="text-decoration-none text-black">
                                        <div class="d-flex justify-content-between">
                                            <div class="details_container">
                                                <h3 class="sub_headings mt-3">Professional &amp; Managed Service Offering
                                                    Manager</h3>
                                                <div class="d-flex align-content-center flex-wrap gap-2">
                                                    <span class="company_nams">WNS Holding...</span>
                                                    <span class="company_reviews"><i class="ri-star-fill"></i> 4.5</span>
                                                    <span class="reviews_">607 Reviews</span>
                                                </div>
                                                <div class="experience_locations d-flex mt-2">
                                                    <span class="exp_ sets d-flex gap-2">
                                                        <i class="ri-shopping-bag-line"></i>
                                                        <span>10-20 Yrs</span>
                                                    </span>
                                                    <span class="sets"> ₹ Not disclosed </span>
                                                    <span class="d-flex gap-2 sets">
                                                        <i class="ri-map-pin-2-line"></i>
                                                        <span>Delhi/NCR</span>
                                                    </span>
                                                </div>
                                                <div class="degree mt-2">
                                                    <p class="text-capitalize text-muted mb-0">
                                                        <i class="ri-book-2-line"></i>
                                                        Bachelor a dgree in business, technology , or arelated field
                                                    </p>
                                                    <p class="text-capitalize text-muted">Infrastructure management Service
                                                    </p>
                                                </div>
                                                <p class="online_day">10d ago</p>

                                            </div>
                                            <span>
                                                <img class="campany_logo" src="logoipsums.png">
                                            </span>
                                        </div>

                                    </a>
                                </div>
                            </div>

                            <div class="card mb-2">
                                <div class="card-body">
                                    <a href="{{ route('frontend.apply-jobs') }}" class="text-decoration-none text-black">
                                        <div class="d-flex justify-content-between">
                                            <div class="details_container">
                                                <h3 class="sub_headings mt-3">Professional &amp; Managed Service Offering
                                                    Manager</h3>
                                                <div class="d-flex align-content-center flex-wrap gap-2">
                                                    <span class="company_nams">WNS Holding...</span>
                                                    <span class="company_reviews"><i class="ri-star-fill"></i> 4.5</span>
                                                    <span class="reviews_">607 Reviews</span>
                                                </div>
                                                <div class="experience_locations d-flex mt-2">
                                                    <span class="exp_ sets d-flex gap-2">
                                                        <i class="ri-shopping-bag-line"></i>
                                                        <span>10-20 Yrs</span>
                                                    </span>
                                                    <span class="sets"> ₹ Not disclosed </span>
                                                    <span class="d-flex gap-2 sets">
                                                        <i class="ri-map-pin-2-line"></i>
                                                        <span>Delhi/NCR</span>
                                                    </span>
                                                </div>
                                                <div class="degree mt-2">
                                                    <p class="text-capitalize text-muted mb-0">
                                                        <i class="ri-book-2-line"></i>
                                                        Bachelor a dgree in business, technology , or arelated field
                                                    </p>
                                                    <p class="text-capitalize text-muted">Infrastructure management Service
                                                    </p>
                                                </div>
                                                <p class="online_day">10d ago</p>
                                            </div>
                                            <span>
                                                <img class="campany_logo" src="logoipsums.png">
                                            </span>
                                        </div>

                                    </a>
                                </div>
                            </div>

                            <div class="card mb-2">
                                <div class="card-body">
                                    <a href="{{ route('frontend.apply-jobs') }}" class="text-decoration-none text-black">

                                        <div class="d-flex justify-content-between">
                                            <div class="details_container">
                                                <h3 class="sub_headings mt-3">Professional &amp; Managed Service Offering
                                                    Manager</h3>

                                                <div class="d-flex align-content-center flex-wrap gap-2">
                                                    <span class="company_nams">WNS Holding...</span>
                                                    <span class="company_reviews"><i class="ri-star-fill"></i> 4.5</span>
                                                    <span class="reviews_">607 Reviews</span>
                                                </div>

                                                <div class="experience_locations d-flex mt-2">

                                                    <span class="exp_ sets d-flex gap-2">
                                                        <i class="ri-shopping-bag-line"></i>
                                                        <span>10-20 Yrs</span>
                                                    </span>
                                                    <span class="sets"> ₹ Not disclosed </span>
                                                    <span class="d-flex gap-2 sets">
                                                        <i class="ri-map-pin-2-line"></i>
                                                        <span>Delhi/NCR</span>
                                                    </span>

                                                </div>

                                                <div class="degree mt-2">
                                                    <p class="text-capitalize text-muted mb-0">
                                                        <i class="ri-book-2-line"></i>
                                                        Bachelor a dgree in business, technology , or arelated field
                                                    </p>
                                                    <p class="text-capitalize text-muted">Infrastructure management Service
                                                    </p>
                                                </div>
                                                <p class="online_day">10d ago</p>

                                            </div>
                                            <span>
                                                <img class="campany_logo" src="logoipsums.png">
                                            </span>
                                        </div>

                                    </a>
                                </div>
                            </div>

                            <!----->
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 sticky-top" style="top: 0;">

                    <div class="card sticky-top" style="top: 70px;">
                        <img src="https://media.istockphoto.com/id/1413735503/photo/social-media-social-media-marketing-thailand-social-media-engagement-post-structure.jpg?s=612x612&w=0&k=20&c=7Y4Bdom9c7paYa67nSCvwSuFoppYxJIh-CTYqe6J4Js="
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <!-- <h5 class="card-title">Card title</h5> -->
                            <p class="company">Some quick example text to build on the card title and make up the bulk of
                                the card’s content.</p>
                            <a href="#" class="linktext text-end">View all</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
