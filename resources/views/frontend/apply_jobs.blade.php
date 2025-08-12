@extends('layouts.frontend.main')

@section('main-section')
    <section>
        <div class="container mb-5">
            <div class="row mt-4">

                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">

                            <div class="slicky_elements">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="d-flex justify-content-between">
                                            <div class="details_container">
                                                <h3 class="sub_headings mt-3">Professional & Managed Service Offering
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
                                            </div>
                                            <span>
                                                <img class="campany_logo" src="logoipsums.png">
                                            </span>
                                        </div>
                                        <hr>
                                        <!--- posted apply time start-->
                                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                                            <p class="text-muted m-0 mb-2 ">
                                                Posted: <span class="text-dark openingTime">Few hours ago</span>
                                                Openings: <span class="text-dark openingTime">24</span>
                                                Applicants: <span class="text-dark openingTime">Less than 10</span>
                                            </p>
                                            <div class="d-flex justify-content-end gap-2 apply_post">
                                                <button class="button applyButton" id="save_job">Save</button>
                                                <button class="button applyButton text-white applyNow"
                                                    id="apply_job">Apply</button>
                                            </div>
                                        </div>
                                        <!--- posted applys time end-->

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- job discreptions start-->
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="card p-3" style="background-color: #f7f7f9;">
                                <h3 class="sub_headings">Job highlights</h3>
                                <ul class="job_discreption">
                                    <li class="mt-2">Graduate/Post Graduate with excellent spoken and written English,
                                        strong email writing skills, and order management experience preferred</li>
                                    <li class="mt-2">Handle customer inquiries, resolve issues, and provide support to
                                        ensure customer satisfaction</li>
                                </ul>

                                <h3 class="sub_headings">Job match score</h3>
                                <ul class="skils d-flex gap-3 flex-wrap">
                                    <li class="d-flex align-items-center gap-2">
                                        <span
                                            class="skill_check matchSkill d-flex justify-content-center align-items-center"><i
                                                class="ri-check-line"></i></span>
                                        <span>Early Applicant</span>
                                    </li>

                                    <li class="d-flex align-items-center gap-2">
                                        <span class="skill_check notMatch d-flex justify-content-center align-items-center">
                                            <i class="ri-close-line"></i>
                                        </span>
                                        <span>Keyskills</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="job_descriptions mt-4">
                                <h3 class="sub_headings">Job description</h3>

                                <p class="fs14 text-muted">
                                    HCL Offers Great Opportunity to make a career, with American global corporation who is a
                                    leading search
                                    engine worldwide Type of Requirement:- E-Mail Support (Excellent Written & Verbal
                                    Communication is a must)
                                    .Designation:-Process associate - Only Immediate joinerShifts - 24* 7 5 days working - 2
                                    days off - Rotational offs.
                                    Required Qualification:- *Graduate / Post Graduate in any stream. Work Location : Client
                                    Site, Unitech Signature Tower , Gurgaon / Gurugram.
                                </p>
                                <div class="keySkills">
                                    <h4 class="sub2_heading">Technical skills:</h4>
                                    <ul>
                                        <li class="text-muted">
                                            As an Order Management Specialist, you will be responsible for processing simple
                                            to complex orders, and handling inquiries from the client with high accuracy and
                                            efficiency.
                                        </li>
                                        <li class="text-muted">You will use deductive reasoning to make sound business
                                            decisions.</li>
                                        <li class="text-muted">You will follow best practices and work cross-functionally
                                            with multiple teams to complete the above tasks and other daily job functions.
                                        </li>
                                    </ul>

                                    <ul class="list-unstyled mt-4">
                                        <li class="text-muted"><span class="textdark ">Role: </span> Customer Retention -
                                            Voice / Blended</li>
                                        <li class="text-muted"><span class="textdark">Industry Type: </span> IT Services &
                                            Consulting</li>
                                        <li class="text-muted"><span class="textdark">Employment Type</span> Full Time,
                                            Permanent</li>
                                    </ul>
                                </div>

                                <div class="educations mt-3">
                                    <h4 class="sub2_heading">Education</h4>
                                    <p class="text-muted" style="font-size: 15px;">
                                        <span class="textdark">UG: </span>
                                        B.B.A/ B.M.S in Any Specialization, B.Pharma in Any Specialization, B.A in Any
                                        Specialization, B.Com in Any Specialization, B.Sc in Any Specialization, BHM in Any
                                        Specialization, BHMS in Any Specialization, BVSC in Any Specialization
                                    </p>
                                </div>

                                <div class="key_skill mt-3">
                                    <h4 class="sub2_heading">Key Skills</h4>
                                    <ul class="keySkillstype list-unstyled d-flex flex-wrap m-0 ">
                                        <li>It Security</li>
                                        <li>Chat Support</li>
                                        <li>Project Management</li>
                                    </ul>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-end">
                                    <a href="#" class="text-decoration-none fw-normal">Report this job</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- job discreptions end-->

                    <!--- about company start-->
                    <div class="card mt-3">
                        <div class="card-body">
                            <h3 class="sub_headings">About company</h3>
                            <p class="fs14 text-muted">
                                Bonami (Service-based organization) is a company that designs and develops modern
                                enterprises. We assist our clients
                                in modernizing technology, reimagining processes,
                                and transforming experiences in order to stay ahead of the curve in today's fast-paced
                                environment.
                                <br><br>
                                We're making a difference in people's lives by working together.
                                Every day, our team lives up to the promise of technology and human inventiveness,
                                positively impacting all stakeholders
                                and assisting our clients in becoming the next and best versions of themselves.
                            </p>
                            <div class="companyinfo mt-2">
                                <h3 class="sub_headings">Company Info</h3>
                                <div>
                                    <span class="textdark">Link: </span>
                                    <a href="#" class="text-decoration-none">website link</a>
                                </div>

                                <div>
                                    <span class="textdark">Address: </span>
                                    <span class="text-muted fs14">H141, Sector 63, Noida, Uttar Pradesh 201301</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- about company end-->

                    <!--- similar job start-->

                    <!--- similar job end-->
                </div>

                <div class="col-lg-4">

                    <div class="card stickytop" style="top: 0;">
                        <div class="card-body">

                            <div class="related_job">
                                <a href="{{ route('frontend.apply-jobs') }}" class="text-dark text-decoration-none">
                                    <div class="d-flex justify-content-between">
                                        <div class="details_container">
                                            <h3 class="sub_headings2 ">Professional & Managed Service Offering Manager</h3>
                                            <div class="d-flex align-content-center flex-wrap gap-2">
                                                <span class="company_nams">WNS Holding...</span>
                                                <span class="company_reviews"><i class="ri-star-fill"></i> 4.5</span>
                                                <span class="reviews_">607 Reviews</span>
                                            </div>

                                            <div class="experience_locations2 d-flex gap-3 flex-wrap">

                                                <div class="exp_ sets d-flex gap-2 flex-wrap mt-2">
                                                    <i class="ri-shopping-bag-line"></i>
                                                    <span>10-20 Yrs</span>
                                                </div>

                                                <div class="d-flex gap-2 sets mt-2">
                                                    <i class="ri-map-pin-2-line"></i>
                                                    <span>Delhi/NCR</span>
                                                </div>
                                            </div>
                                        </div>
                                        <span>
                                            <img class="campany_logo" src="logoipsums.png">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <hr>

                            <div class="related_job">
                                <a href="{{ route('frontend.apply-jobs') }}" class="text-dark text-decoration-none">
                                    <div class="d-flex justify-content-between">
                                        <div class="details_container">
                                            <h3 class="sub_headings2 ">Professional & Managed Service Offering Manager</h3>
                                            <div class="d-flex align-content-center flex-wrap gap-2">
                                                <span class="company_nams">WNS Holding...</span>
                                                <span class="company_reviews"><i class="ri-star-fill"></i> 4.5</span>
                                                <span class="reviews_">607 Reviews</span>
                                            </div>

                                            <div class="experience_locations2 d-flex gap-3 flex-wrap">

                                                <div class="exp_ sets d-flex gap-2 flex-wrap mt-2">
                                                    <i class="ri-shopping-bag-line"></i>
                                                    <span>10-20 Yrs</span>
                                                </div>

                                                <div class="d-flex gap-2 sets mt-2">
                                                    <i class="ri-map-pin-2-line"></i>
                                                    <span>Delhi/NCR</span>
                                                </div>
                                            </div>
                                        </div>
                                        <span>
                                            <img class="campany_logo" src="logoipsums.png">
                                        </span>
                                    </div>
                                </a>
                            </div>

                            <hr>

                            <div class="related_job">
                                <a href="{{ route('frontend.apply-jobs') }}" class="text-dark text-decoration-none">
                                    <div class="d-flex justify-content-between">
                                        <div class="details_container">
                                            <h3 class="sub_headings2 ">Professional & Managed Service Offering Manager</h3>
                                            <div class="d-flex align-content-center flex-wrap gap-2">
                                                <span class="company_nams">WNS Holding...</span>
                                                <span class="company_reviews"><i class="ri-star-fill"></i> 4.5</span>
                                                <span class="reviews_">607 Reviews</span>
                                            </div>

                                            <div class="experience_locations2 d-flex gap-3 flex-wrap">

                                                <div class="exp_ sets d-flex gap-2 flex-wrap mt-2">
                                                    <i class="ri-shopping-bag-line"></i>
                                                    <span>10-20 Yrs</span>
                                                </div>

                                                <div class="d-flex gap-2 sets mt-2">
                                                    <i class="ri-map-pin-2-line"></i>
                                                    <span>Delhi/NCR</span>
                                                </div>
                                            </div>
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


        </div>
    </section>
@endsection
