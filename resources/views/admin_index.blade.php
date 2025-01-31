@extends('layout')

@section('content')

@if(session('success'))
<div class="alert alert-success mt-4" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="mt-2">
    <h2> Admin Index </h2>
    <table class="table table-success table-striped align-middle table-nowrap mb-0">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($admins as $admin)
        <tr>
            <th scope="row">{{$admin->id}}</th>
            <td>{{$admin->first_name}} {{$admin->last_name}}</td>
            <td>{{$admin->email}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection