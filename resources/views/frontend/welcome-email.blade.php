@extends('layouts.frontend.main')

@section('main-section')
    <section>
        <div class="container">
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card shadow-sm p-4">
                        <h4 class="mb-3">
                            Welcome to
                            @if ($employmenthome)
                                {{ $employmenthome->company_name }}
                            @else
                                {{ 'No company record' }}
                            @endif
                        </h4>

                        <p>Dear <strong>{{ Auth::user()->name ?? '' }}</strong>,</p>

                        <p>
                            We are excited to welcome you to the team at
                            <strong>{{ $employmenthome->company_name ?? 'N/A' }}</strong>!
                            Congratulations on your successful application through <strong>Job Portal Name</strong> —
                            we’re thrilled to have you on board.
                        </p>

                        <p>
                            Your skills and experience stood out to us, and we are confident you will make a valuable
                            contribution to our team.
                            Your role as <strong>Job Title</strong> will begin on <strong>Start Date</strong>,
                            and we’ve prepared everything to ensure you have a smooth onboarding experience.
                        </p>

                        <h5 class="mt-4">Here are a few important details for your first day:</h5>
                        <ul>
                            <li><strong>Reporting Time:</strong> Time</li>
                            <li><strong>Location/Office Address:</strong> Office Address or Remote Details</li>
                            <li><strong>Point of Contact:</strong> Name & Contact Info of HR or Manager</li>
                            <li><strong>Documents to Bring:</strong> List of any required documents, if applicable</li>
                        </ul>

                        <p>
                            You’ll receive your onboarding schedule and other essential information soon.
                            In the meantime, feel free to reach out if you have any questions.
                        </p>

                        <p>
                            Once again, welcome to <strong>Company Name</strong>!
                            We look forward to achieving great things together.
                        </p>

                        <p class="mb-0">Warm regards,</p>
                        <p>
                            Your Full Name<br>
                            Your Job Title<br>
                            Company Name<br>
                            Email Address | Phone Number
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
