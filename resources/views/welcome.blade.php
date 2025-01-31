@extends('auth.layout')

@section('content')
 

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card mt-4">
            <div class="card-body p-4">
                <div class="text-center mt-2">
                    <h3 class="text-primary">Welcome to our Digital Home</h3>
                    <p class="text-muted">Get your free velzon account now</p>
                </div>
                <div class="p-2 mt-4">
                    <form class="needs-validation" action="{{ route('registration') }}" method="post" id="registration" novalidate>
                        @csrf
                        <div class="row">
                        <div class="mt-4">
                        <a href="{{ route('customerRegister') }}" class="btn btn-success w-100">Customer Registration</a>
                        </div>
                        </div>

                        <div class="row">
                        <div class="mt-4">
                        <a href="{{ route('adminRegister') }}" class="btn btn-success w-100">Admin Registration</a>
                        </div>
                        </div>

                        <div class="row">
                        <div class="mt-4">
                        <a href="{{ route('login') }}" class="btn btn-success w-100">Admin Login</a>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


