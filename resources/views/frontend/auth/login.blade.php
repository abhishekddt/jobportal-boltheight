<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!--- select 2 css link-->
    <link href="{{ url('assets/backend/libs/select2/select2.min.css') }} " rel="stylesheet">
    @routes
    @vite(['resources/js/app.js'])

    <style>
        * {
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
            font-family: "Jost", sans-serif;
        }

        body {
            height: 100vh;
            overflow: hidden;
        }

        .login_condidate {
            width: 80%;
        }

        .form-group input:focus {
            outline: none;
            box-shadow: none;
        }

        .sign_inButton {
            border: none;
            background-color: #131D4F;
            padding: 10px;
            color: #fff;
            font-weight: 500;
            border-radius: 10px;
        }

        .headings {
            font-size: 22px;
        }

        .eye_elements {
            position: absolute;
            top: 50%;
            right: 5px;
            transform: translateY(-50%);
            font-size: 14px;
            cursor: pointer;
        }

        .select2-container .select2-selection--single {
            height: 35px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 33px !important;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #dee2e6 !important;
        }

        .select2-container--open .select2-dropdown--below {
            border: 1px solid #dee2e6 !important;
        }
    </style>
</head>

<body>

    <section class="w-100 h-100">
        <div class="row h-100 w-100">
            <div class="col-md-6 d-flex justify-content-center align-items-center" style="background-color: #131D4F;">
                <div>
                    <h1 class="text-white" id="welcome_text">Welcome to login</h1>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="login_condidate">
                    <div class="card">
                        <div class="card-body">

                            <div class="login" id="login_elements">
                                <h2 class="headings">Log in</h2>
                                <form action="{{ route('frontend.login_store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label mb-0">Email id</label>
                                        <input type="email" placeholder="Email" class="form-control" name="email"
                                            maxlength="35" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label class="form-label mb-0">Password</label>
                                        <div class="position-relative">
                                            <input type="password" id="login_password" placeholder="Password"
                                                name="password" class="form-control" required>
                                            <i class="ri-eye-line eye_elements toggle-password"
                                                data-target="login_password" id="login_show_password"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-2 mb-2">
                                        <a href="#" class="text-decoration-none text-muted"
                                            id="forget_password">Forgot your password? </a>
                                    </div>
                                    <div class="form-group d-flex justify-content-center mt-3 mb-3">
                                        <button class="sign_inButton w-75 text-center text-decoration-none"
                                            type="submit"> Sign In</button>
                                    </div>
                                </form>
                                <p class="text-center">Don't have an account? <a type="button" id="createNew_account"
                                        class="text-decoration-none">Create new account &#8594;</a></p>
                            </div>

                            <!---- forget password start-->
                            <div class="login" id="forget_elements" style="display: none;">
                                <h2 class="headings">Forgot password</h2>
                                <form action="{{ route('password.email') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label mb-0">Email id</label>
                                        <input type="email" placeholder="Email id" class="form-control" name="email"
                                            value="{{ old('email') }}" required autofocus>
                                    </div>

                                    <div class="form-group d-flex justify-content-center mt-3 mb-3">
                                        <input class=" sign_inButton w-75 text-center text-decoration-none"
                                            type="submit" value="Email Password Reset Link">
                                    </div>
                                </form>
                                <p class="text-center">Back to <a type="button"
                                        class="text-decoration-none gologin">Login &#8594;</a></p>
                            </div>
                            <!---- forget password end-->

                            <!--- register user-->
                            <div class="register login" id="register_elements" style="display: none;">
                                <h2 class="headings">Create your profile</h2>
                                <form id="register_user" action="{{ route('frontend.register') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label mb-0">First Name<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="first_name" id="first_name"
                                                    placeholder="First Name" class="form-control typeText"
                                                    maxlength="25" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label mb-0">Last Name<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="last_name" id="last_name"
                                                    placeholder="Last Name" class="form-control typeText"
                                                    maxlength="25" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label class="form-label mb-0">Email id<span
                                                        class="text-danger">*</span></label>
                                                <input type="email" name="email" id="email"
                                                    placeholder="Email" class="form-control" required>

                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label mb-0">Mobile Number<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" name="phone" id="phone_number"
                                                    placeholder="Mobile Number" class="form-control typeNumber"
                                                    required>
                                            </div>
                                            <p class="text-danger" id="mobile_number_error"
                                                style="font-size: 14px; display: none;"></p>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label mb-0">Country <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control" name="country" id="country" required
                                                    style="width: 100%;">
                                                    <option selected disabled>Select Country</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label mb-0">State <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control" name="state" id="state" required
                                                    style="width: 100%;">
                                                    <option selected disabled class="text-muted">Select State</option>
                                                    @if (!empty($states) && count($states) > 0)
                                                        @foreach ($states as $state)
                                                            <option value="{{ $state->id }}">{{ $state->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="form-group select2form">
                                                <label class="form-label mb-0">City <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control" name="city" id="city" required
                                                    style="width: 100%;">
                                                    <option selected class="text-muted">Select City</option>
                                                    @if (!empty($cities))
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id }}">{{ $city->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <div class="form-group">
                                                <label class="form-label mb-0">Password<span
                                                        class="text-danger">*</span></label>
                                                <div class="position-relative">
                                                    <input type="password" name="password" placeholder="Password"
                                                        class="form-control" required id="first_password">
                                                    <i class="ri-eye-line eye_elements toggle-password"
                                                        data-target="first_password" id="password"></i>
                                                </div>
                                                <p class="text-danger" id="password" id="password_limit"
                                                    style="font-size: 14px; display: none;"></p>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <div class="form-group">
                                                <label class="form-label mb-0">Confirm Password<span
                                                        class="text-danger">*</span></label>
                                                <div class="position-relative">
                                                    <input type="password" name="password_confirmation"
                                                        placeholder="Confirm Password" class="form-control" required
                                                        id="confirm_password">
                                                    <i class="ri-eye-line eye_elements toggle-password"
                                                        id="show_confirm_password" data-target="confirm_password"></i>
                                                </div>
                                                <p class="text-danger" id="password_error"
                                                    style="font-size: 14px; display: none;"></p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <p class="text-danger m-0" id="password_not_matched"
                                                style="font-size:12px; display:none;">Password do not matched</p>
                                            <p class="text-success m-0" id="password_matched"
                                                style="font-size:12px; display:none;">Password matched</p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label mb-0">Gender<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control selects1" name="gender" id="gender"
                                                    required>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label mb-0">Aviation & Non Aviation<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control selects1" name="aviation_type"
                                                    id="aviation_non_aviation" required>
                                                    <option selected disabled>Select Aviation or Non Aviation</option>
                                                    <option value="aviation">Aviation</option>
                                                    <option value="non_aviation">Non Aviation</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <div class="d-flex gap-5">
                                                <div class="form-check">
                                                    <input class="form-check-input" value="1" type="radio"
                                                        name="experienced" id="experienced" checked required>
                                                    <label class="form-check-label" for="experienced">
                                                        I'm experienced
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" value="0" type="radio"
                                                        name="experienced" id="fresher" required>
                                                    <label class="form-check-label" for="fresher">
                                                        I'm a fresher
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group d-flex justify-content-center mt-3 mb-3">
                                        <button class=" sign_inButton w-75 text-center text-decoration-none"
                                            type="submit">Register Now</button>
                                    </div>
                                </form>
                                <p class="text-center">You have an account <a type="button"
                                        class="text-decoration-none gologin">Login &#8594;</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ url('assets/frontend/script/script.js') }}"></script>
    <!--- select 2 link-->
    <script src="{{ url('assets/backend/libs/select2/select2.full.min.js') }}"></script>
    <script src="{{ url('assets/backend/libs/select2/select2.min.js') }}"></script>
    <script src="{{ url('assets/backend/libs/select2/select2.init.js') }}"></script>


    <script>
        $(document).ready(function() {
            let login_elements = $('#login_elements');
            let register_elements = $('#register_elements');
            let forget_elements = $('#forget_elements');

            $('#createNew_account').on('click', function() {
                register_elements.show();
                login_elements.hide();
                forget_elements.hide();
                $('#welcome_text').text('Welcome to Register');
            });

            $('.gologin').on('click', function() {
                register_elements.hide();
                login_elements.show();
                forget_elements.hide();
                $('#welcome_text').text('Welcome to Login');
            })

            $('#forget_password').on('click', function() {
                register_elements.hide();
                login_elements.hide();
                forget_elements.show();
                $('#welcome_text').text('Forget Password');
            })
        });
    </script>

    <script>
        $(document).ready(function() {

            $('#confirm_password, #first_password').on('keyup', function() {
                let password = $('#first_password').val();
                let confirmPassword = $('#confirm_password').val();

                if (password.length > 0 || confirmPassword.length > 0) {
                    if (password === confirmPassword) {
                        $('#password_matched').show();
                        $('#password_not_matched').hide();
                    } else {
                        $('#password_not_matched').show();
                        $('#password_matched').hide();
                    }
                } else {
                    $('#password_matched').hide();
                    $('#password_not_matched').hide();
                }
            });

            document.querySelectorAll('.toggle-password').forEach(icon => {
                icon.addEventListener('click', function() {
                    const targetInput = document.getElementById(this.getAttribute('data-target'));
                    const type = targetInput.getAttribute('type') === 'password' ? 'text' :
                        'password';
                    targetInput.setAttribute('type', type);
                    this.classList.toggle('ri-eye-line');
                    this.classList.toggle('ri-eye-off-line');
                });
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Country to State
            $('#country').on('change', function() {
                let countryId = $(this).val();
                if (countryId) {
                    $.ajax({
                        url: "/get-states/" + countryId,
                        type: 'GET',
                        success: function(states) {
                            $('#state').empty().append(
                                '<option disabled selected>Select State</option>');
                            $('#city').empty().append(
                                '<option disabled selected>Select City</option>');
                            $.each(states, function(key, value) {
                                $('#state').append('<option value="' + value.id + '">' +
                                    value.name + '</option>');
                            });
                        }
                    });
                }
            });

            // State to City
            $('#state').on('change', function() {
                let stateId = $(this).val();
                if (stateId) {
                    $.ajax({
                        url: "/get-cities/" + stateId,
                        type: 'GET',
                        success: function(cities) {
                            $('#city').empty().append(
                                '<option disabled selected>Select City</option>');
                            $.each(cities, function(key, value) {
                                $('#city').append('<option value="' + value.id + '">' +
                                    value.name + '</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>

</body>

</html>
