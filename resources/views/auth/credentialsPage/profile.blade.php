@extends('layouts.template')

@section('title', 'Profile')

@section('content')
<br><br>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="container mt-5">

    <div class="row">

        <div class="col">

            <div class="card">
                <div class="card-header">
                    {{ Auth::user()->name }},
                    <div class="float-right">
                        <text class="text-muted">Account from: {{ Auth::user()->created_at->format('d/m/Y   ') }}
                        </text>
                    </div>
                </div>

                <div class="card-body shadow-lg">

                    {{-- Detail --}}
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email:</label>
                                <fieldset disabled>
                                    <input type="email" value="{{ Auth::user()->name }}" class="form-control"
                                        id="disabledTextInput" aria-describedby="emailHelp">
                                    <fieldset>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Level:</label>
                                <fieldset disabled>
                                    <input type="text" value="{{ Auth::user()->level }}" class="form-control"
                                        id="exampleInputPassword1">
                                    <fieldset>
                            </div>
                        </div>
                    </div>
                    @can('admin')
                    {{-- end Detail --}}
                    <br><br>
                    <h4 class="text">Users Table</h4>
                    <hr>
                    {{-- Table --}}
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Level</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->name }}</td>
                                <td>
                                    <form action="/change/{{ $data->id }}" method="post">
                                        @csrf
                                        @method('put')
                                        <select class="form-select" selected name="level"
                                            aria-label="Default select example">
                                            <option value="{{ $data->level }}">---{{ $data->level }}---
                                            </option>
                                            <option value="admin">admin</option>
                                            <option value="mahasiswa">mahasiswa</option>
                                        </select>
                                </td>
                                <td>

                                    <button class="btn btn-warning" type="submit" data-bs-toggle="collapse"
                                        data-bs-target="#collapseWidthExample" aria-expanded="false"
                                        aria-controls="collapseWidthExample">
                                        Save
                                    </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- end Table --}}
                    @endcan
                </div>
            </div>

        </div>

    </div>
    <br><br><br>


    @endSection()
