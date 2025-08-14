@extends('layouts.backend.main')
@section('main-section')
    <div class="page-wrapper">
        <div class="page-titles">
            <div class="row">
                <div class="col-8 align-self-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-flex align-items-center">
                            <li class="breadcrumb-item">
                                <a href="{{ route('backend.dashboard') }}" class="link"><i
                                        class="ri-home-3-line fs-5"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Admin
                            </li>
                        </ol>
                        <h3 class="mb-0 fw-bold">New Admin</h3>
                    </nav>
                </div>
                <div class="col-4 d-flex align-items-center justify-content-end">
                    <a href="javascript:history.back()" class="btn btn-sm d-flex align-items-center ms-3 addButton">
                        <i class="ri-arrow-go-back-line"></i> Back
                    </a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form id="submit_new_admin" action="{{ route('backend.admin.store_admin') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="card borderRadius">
                            <div class="card-body p-3">
                                <div class="row formselector">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark">First Name <span class="text-danger"> *</span></label>
                                            <input type="text" name="first_name" placeholder="First Name"
                                                value="{{ old('first_name') }}" class="form-control typeText" required>
                                        </div>
                                        @error('first_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark">Last Name <span class="text-danger"> *</span></label>
                                            <input type="text" name="last_name" value="{{ old('last_name') }}"
                                                placeholder="Last Name" class="form-control typeText" required>
                                        </div>
                                        @error('last_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark">Email<span class="text-danger"> *</span></label>
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                placeholder="Email" class="form-control" required id="admin_email">
                                        </div>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark">Phone<span class="text-danger"> *</span></label>
                                            <input type="number" name="phone" placeholder="Phone Number"
                                                class="form-control typeNumber" value="{{ old('phone') }}" required
                                                id="admin_phone">
                                        </div>
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark">Password <span class="text-danger"> *</span></label>
                                            <input type="password" placeholder="Password" name="password"
                                                class="form-control typePassword" required id="admin_password">
                                        </div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="text-dark">Confirm Password <span class="text-danger">
                                                    *</span></label>
                                            <input type="password" placeholder="Confirm Password:"
                                                name="password_confirmation" class="form-control typePassword" required
                                                id="admin_confirm_password">
                                        </div>
                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="submitBtn mt-5 d-flex justify-content-end gap-3">
                                    <button type="submit" class="btn btnBg text-white">Submit</button>
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
