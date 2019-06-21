@extends('welcome')
@section('content')
<div class="title m-b-md">
    Dress Factory
</div>
<div class="links">
    <a href="{{route('products')}}">Products</a>
    <a href="{{route('customers')}}">Customers</a>
    <a href="#">Orders</a>
</div>
@stop