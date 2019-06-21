@extends('welcome')
@section('content')
    <style>
        .flex-center {
            align-items: flex-start;
            margin-top: 3%;
        }
    </style>
    <h1>Customers</h1>
    <br>
    <a href="{{route('home')}}" style="float: left">Home</a><br>
    <a  href="{{route('add-customer')}}" type="button" class="btn btn-warning">Add New</a>
    <br />
    <br />
    <br />
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
@stop