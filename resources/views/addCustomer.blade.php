@extends('welcome')
@section('content')
  <style>
    .flex-center {
      align-items: flex-start;
      margin-top: 3%;
    }
    .content {
      text-align: left;
    }
  </style>
  @if(is_null($id))
    <h1>Product > Add Product</h1>
  @else
    <h1>Product > Update Product</h1>
  @endif
  <br>
  <a href="{{route('home')}}">Home</a>&nbsp;&nbsp;
  <a href="{{route('customers')}}">Customers</a>
  <br />
  <br />
  <br />
  @if(session()->has('message'))
    <div class="alert alert-success">
      {{ session()->get('message') }}
    </div>
  @endif

  <form method="post" action="{{ !empty($customer) ? route('update-customer') : route('create-customer')}}">
    {{ csrf_field() }}

    <input type="hidden" class="form-control" name="id" value="{{ !empty($customer) ? $customer['id'] : '' }}">
    <div class="form-group">
      <label for="exampleInputEmail1">Code</label>
      <input type="text" class="form-control" name="code" value="{{ !empty($customer) ? $customer['name'] : '' }}">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input type="text" class="form-control" name="address" value="{{ !empty($customer) ? $customer['address'] : '' }}">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Price</label>
      <input type="text" class="form-control" name="phone" value="{{ !empty($customer) ? $customer['phone'] : '' }}">
    </div>
    @if(is_null($id))
      <button type="submit" class="btn btn-primary btn-sm">Create Customer</button>
    @else
      <button type="submit" class="btn btn-primary btn-sm">Update Customer</button>
    @endif
  </form>
@stop