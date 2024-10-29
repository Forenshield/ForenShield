@extends('layouts.app')

@section('content')
    <main class="main-content mt-0">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card mt-8">
                                <div class="card-header pb-0 text-left bg-transparent text-center ">
                                    <div class="w-100 text-center pb-4">
                                        <img src="{{ asset('assets/img/logo.png') }}" alt="" class="w-50">
                                    </div>
                                    <h3 class="font-weight-bolder text-success text-gradient">Registration</h3>
                                    <p class="mb-0">Create your new-born account</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" class="text-start" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class=" my-3">
                                            <label class="form-label">National Identity Card Number</label>
                                            <br>
                                            <input id="nic" type="text"
                                                class="form-control @error('nic') is-invalid @enderror" name="nic"
                                                value="{{ old('nic') }}" required autocomplete="nic" autofocus>

                                            @error('nic')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class=" my-3">
                                            <label class="form-label">Vehicle Number</label>
                                            <br>
                                            <input id="vehicle_number" type="text"
                                                class="form-control @error('vehicle_number') is-invalid @enderror" name="vehicle_number"
                                                value="{{ old('vehicle_number') }}" required autocomplete="vehicle_number" autofocus>

                                            @error('vehicle_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class=" my-3">
                                            <label class="form-label">Name</label>
                                            <br>
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class=" mb-3">
                                            <label class="form-label">Email</label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class=" mb-3">
                                            <label class="form-label">Password</label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class=" mb-3">
                                            <label class="form-label">Password Confirmation</label>
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Create
                                                New Account</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('layouts.footer')
@endsection
