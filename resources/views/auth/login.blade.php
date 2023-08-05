@extends('layouts.template')

@section('title', 'Login to Academic System')


@section('content')


<br><br>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger">
    <p>{{ $message }}</p>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    Failed, try again!
</div>
@endif
<div class="container mt-5">

    <div class="row">

        <div class="col">

            <div class="row">
                <div class="col-12">
                    <div class="d-grid gap-2">
                        <a class="btn btn-primary mb-2" data-bs-toggle="collapse" href="#multiCollapseExample1"
                            role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Login</a>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">

                            <div class="collapse multi-collapse" id="multiCollapseExample1">
                                <div class="card card-body shadow mb-3">

                                    <form method="post" action="/login/post">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                                            <input type="email" value="{{ old('email1') }}" name="email1"
                                                class="form-control @error('email1') is-invalid @enderror"
                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                            @error('email1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <div id="emailHelp" class="form-text">We'll never share your email with
                                                anyone else.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password" name="password1"
                                                class="form-control @error('password1') is-invalid @enderror"
                                                id="exampleInputPassword1">
                                            @error('password1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </form>

                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button class="btn btn-success mt-2" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#multiCollapseExample2" aria-expanded="false"
                                    aria-controls="multiCollapseExample2">Register</button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-sm-12">
                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                        <div class="card card-body shadow">
                            <form method="post" action="/register/post">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror"
                                        id="exampleInputEmail1" aria-describedby="emailHelp">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        id="exampleInputPassword1">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success">Register</button>
                            </form>
                        </div>
                    </div>



                </div>
            </div>

        </div>
    </div>
</div>


@endSection
