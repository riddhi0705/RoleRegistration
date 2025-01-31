@extends('auth.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card mt-4">
            <div class="card-body p-4">
                <div class="text-center mt-2">
                    <h5 class="text-primary">Create New Account</h5>
                    <p class="text-muted">Get your free velzon account now</p>
                </div>
            <div class="p-2 mt-4">
                <form class="needs-validation" action="{{ route('customerRegistration') }}" method="post" id="customerRegistration" novalidate>
                    @csrf
                    <div class="row">
                        <h4><u> Personal Details </h4></u>
                    </div>

                    <!-- First Name -->
                    <div class="mb-3 mt-2">
                        <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
                        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter Your First Name">
                        @if ($errors->has('first_name'))
                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                        @endif
                    </div>

                    <!-- Last Name -->
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name <span class="text-danger">*</span></label>
                        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter Your First Name" value="">
                        @if ($errors->has('last_name'))
                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                        @endif
                    </div>

                    <!-- Email ID -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email address">
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <!-- password -->
                    <div class="mb-3">
                        <label class="form-label" for="password-input">Password</label>
                        <div class="position-relative auth-pass-inputgroup">
                            <input type="password" name="password" class="form-control pe-5 password-input" id="confirm-password" onpaste="return false" placeholder="Enter password" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <!-- confirm password -->
                    <div class="mb-3">
                        <label class="form-label" for="password-input">Confirm Password</label>
                        <div class="position-relative auth-pass-inputgroup">
                            <input type="password" name="confirm_password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Enter password" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="confirm-password"><i class="ri-eye-fill align-middle"></i></button>
                            @if ($errors->has('confirm_password'))
                            <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                            @endif
                        </div>
                    </div> 

                    <div class="mb-4">
                        <p class="mb-0 fs-12 text-muted fst-italic">By registering you agree to the Velzon <a href="#" class="text-primary text-decoration-underline fst-normal fw-medium">Terms of Use</a></p>
                    </div>

                    <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                        <h5 class="fs-13">Password must contain:</h5>
                        <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                        <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                        <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                        <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-success w-100" type="submit">Sign Up</button>
                        <a href="{{ route('welcome') }}" class="btn btn-success w-100 mt-3">Go back</a>
                    </div>

                    <div class="mt-4 text-center">
                        <div class="signin-other-title">
                            <h5 class="fs-13 mb-4 title text-muted">Create account with</h5>
                        </div>

                        <div>
                            <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></button>
                            <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></button>
                            <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></button>
                            <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i class="ri-twitter-fill fs-16"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <div class="mt-4 text-center">
        <p class="mb-0">Already have an account ? <a href="{{ route('login')}}" class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
    </div>
@endsection

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $("#customerRegistration").validate({
                rules: {
                    first_name: {
                        required: true,
                        maxlength: 20,
                    },
                    last_name: {
                        required: true,
                        maxlength: 20,
                    },
                    email: {
                        required: true,
                        domain: true,
                        email: true,
                        maxlength: 50
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    confirm_password: {
                        required: true,
                        equalTo: "#password"
                    },
                },
                messages: {
                    first_name: {
                        required: "First name is required",
                        maxlength: "First name cannot be more than 20 characters"
                    },
                    last_name: {
                        required: "Last name is required",
                        maxlength: "Last name cannot be more than 20 characters"
                    },
                    email: {
                        required: "Email is required",
                        email: "Email must be a valid email address",
                        maxlength: "Email cannot be more than 50 characters"
                    },
                    password: {
                        required: "Password is required",
                        minlength: "Password must be at least 5 characters"
                    },
                    confirm_password: {
                        required: "Confirm password is required",
                        equalTo: "please check again your password before submit"
                    },
                }
            });
        });
    </script>
</body>
</html>
