@extends('welcome')
@section('content')
    <style>
        .flex-center {
            align-items: flex-start;
            margin-top: 3%;
        }
    </style>
    <h1>Products</h1>
    <br>
    <a href="{{route('home')}}" style="float: left">Home</a><br>
    <a  href="{{route('add-product')}}" type="button" class="btn btn-warning">Add New</a>
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
            <th scope="col">Code</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php
            if (count($products) > 0) {
                foreach ($products as $product) {
        ?>
        <tr>
            <td>{{ $product['id'] }}</td>
            <td>{{ $product['code'] }}</td>
            <td>{{ $product['name'] }}</td>
            <td>{{ $product['price'] }}</td>
            <td>
                <a  href="{{route('add-product', [$product['id']])}}" type="button" class="btn btn-sm btn-info">Edit</a>
                <a  href="{{route('delete-product', [$product['id']])}}" type="button" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>
        <?php
                }
            }
        ?>
        </tbody>
    </table>
@stop