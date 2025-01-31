@extends('layout')

@section('content')

@if(session('success'))
<div class="alert alert-success mt-4" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="mt-2">
<h2> Customer Index </h2>
    <table class="table table-success table-striped align-middle table-nowrap mb-0">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <th scope="row">{{$customer->id}}</th>
                <td>{{$customer->first_name}} {{$customer->last_name}}</td>
                <td>{{$customer->email}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection