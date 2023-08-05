@extends('layouts.template')

@section('title', 'Home Page')

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
                    Choose Your Segment, {{ Auth::user()->name }}
                </div>
                <div class="card-body shadow-lg">

                    @can('admin')
                    <button type="button" class="btn btn-outline-danger m-2">High Level</button><br>
                    <button type="button" class="btn btn-outline-warning m-2">Med Level</button><br>
                    @endcan

                    @can('admin')
                    <button type="button" class="btn btn-outline-success m-2">Low Level</button><br>
                    @elsecan('mahasiswa')
                    <button type="button" class="btn btn-outline-success m-2">Low Level</button><br>
                    @endcan

                </div>

            </div>

        </div>

    </div>

    @endSection()
