@extends('layouts.frontend.main')

@section('main-section')
    <section>
        <div class="container">
            <div class="row mt-4 direction_column">

                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="headings">Recommended Jobs for you</h3>
                                <!-- <a href="jobs.html" class="linktext">View all</a> -->
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

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="preferences-tab" data-bs-toggle="pill"
                                            data-bs-target="#preferences" type="button" role="tab"
                                            aria-controls="preferences" aria-selected="false">Preferences (32)</button>
                                    </li>
                                </ul>

                                <div class="tab-content" id="pills-tabContent">

                                    <!--profile tab start-->
                                    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                                        aria-labelledby="pills-profile-tab" tabindex="0">
                                        <div class="applies_job">
                                            <div class="slicky_elements">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <a href="{{ route('frontend.apply-jobs') }}"
                                                            class="text-decoration-none text-black">

                                                            <div class="d-flex justify-content-between">
                                                                <div class="details_container">
                                                                    <h3 class="sub_headings mt-3">Professional & Managed
                                                                        Service Offering Manager</h3>

                                                                    <div
                                                                        class="d-flex align-content-center flex-wrap gap-2">
                                                                        <span class="company_nams">WNS Holding...</span>
                                                                        <span class="company_reviews"><i
                                                                                class="ri-star-fill"></i> 4.5</span>
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
                                                                            Bachelor a dgree in business, technology , or
                                                                            arelated field
                                                                        </p>
                                                                        <p class="text-capitalize text-muted">
                                                                            Infrastructure management Service</p>
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
                                            </div>
                                        </div>

                                        <div class="applies_job">
                                            <div class="slicky_elements">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <a href="{{ route('frontend.apply-jobs') }}"
                                                            class="text-decoration-none text-black">

                                                            <div class="d-flex justify-content-between">
                                                                <div class="details_container">
                                                                    <h3 class="sub_headings mt-3">Professional & Managed
                                                                        Service Offering Manager</h3>

                                                                    <div
                                                                        class="d-flex align-content-center flex-wrap gap-2">
                                                                        <span class="company_nams">WNS Holding...</span>
                                                                        <span class="company_reviews"><i
                                                                                class="ri-star-fill"></i> 4.5</span>
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
                                                                            Bachelor a dgree in business, technology , or
                                                                            arelated field
                                                                        </p>
                                                                        <p class="text-capitalize text-muted">
                                                                            Infrastructure management Service</p>
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
                                            </div>
                                        </div>
                                    </div>
                                    <!--profile tab end-->

                                    <!--applies tab start-->
                                    <div class="tab-pane fade" id="pills-tab2" role="tabpanel"
                                        aria-labelledby="pills-tab2-tab" tabindex="0">

                                        <div class="applies_job">
                                            <div class="slicky_elements">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <a href="{{ route('frontend.apply-jobs') }}"
                                                            class="text-decoration-none text-black">

                                                            <div class="d-flex justify-content-between">
                                                                <div class="details_container">
                                                                    <h3 class="sub_headings mt-3">Professional & Managed
                                                                        Service Offering Manager</h3>

                                                                    <div
                                                                        class="d-flex align-content-center flex-wrap gap-2">
                                                                        <span class="company_nams">WNS Holding...</span>
                                                                        <span class="company_reviews"><i
                                                                                class="ri-star-fill"></i> 4.5</span>
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
                                                                            Bachelor a dgree in business, technology , or
                                                                            arelated field
                                                                        </p>
                                                                        <p class="text-capitalize text-muted">
                                                                            Infrastructure management Service</p>
                                                                    </div>
                                                                    <p class="online_day">10d ago</p>
                                                                </div>
                                                                <span>
                                                                    <img class="campany_logo" src="logoipsums.png">
                                                                </span>
                                                            </div>
                                                            <div class="d-flex justify-content-end">
                                                                <span
                                                                    class="d-flex justify-content-center align-items-center gap-2 applyjob">
                                                                    <span
                                                                        class="skill_check matchSkill d-flex justify-content-center align-items-center"><i
                                                                            class="ri-check-line"></i></span>
                                                                    <span style="font-size: 12px;">Apply </span>
                                                                </span>
                                                            </div>

                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--applies tab end-->

                                    <!--preference tab start-->
                                    <div class="tab-pane fade" id="preferences" role="tabpanel"
                                        aria-labelledby="preferences-tab" tabindex="0">
                                        <div class="preferences">
                                            <div class="slicky_elements">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <a href="{{ route('frontend.apply-jobs') }}"
                                                            class="text-decoration-none text-black">

                                                            <div class="d-flex justify-content-between">
                                                                <div class="details_container">
                                                                    <h3 class="sub_headings mt-3">Professional & Managed
                                                                        Service Offering Manager</h3>

                                                                    <div
                                                                        class="d-flex align-content-center flex-wrap gap-2">
                                                                        <span class="company_nams">WNS Holding...</span>
                                                                        <span class="company_reviews"><i
                                                                                class="ri-star-fill"></i> 4.5</span>
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
                                                                            Bachelor a dgree in business, technology , or
                                                                            arelated field
                                                                        </p>
                                                                        <p class="text-capitalize text-muted">
                                                                            Infrastructure management Service</p>
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
                                            </div>
                                        </div>
                                    </div>
                                    <!--preference tab end-->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 sticky-top" style="top: 0;">

                    <div class="card sticky-top" style="top: 70px;">
                        <div class="card-body">
                            <h3 class="sub_headings mt-3">Add preferences to get matching jobs</h3>
                            <p class="company"> Preferred job role <i class="ri-pencil-line text-info"></i></p>
                            <ul class="keySkillstype list-unstyled d-flex flex-wrap m-0 ">
                                <li>It Security</li>
                                <li>Chat Support</li>
                                <li>Project Management</li>
                                <li>It Head</li>
                            </ul>
                            <!-- <a href="#" class="linktext text-end">View all</a>  -->
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </section>
@endsection
