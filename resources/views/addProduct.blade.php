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
  <a href="{{route('products')}}">Products</a>
  <br />
  <br />
  <br />
  @if(session()->has('message'))
    <div class="alert alert-success">
      {{ session()->get('message') }}
    </div>
  @endif

  <form method="post" action="{{ !empty($product) ? route('update-product') : route('create-product')}}">
    {{ csrf_field() }}

    <input type="hidden" class="form-control" name="id" value="{{ !empty($product) ? $product['id'] : '' }}">
    <div class="form-group">
      <label for="exampleInputEmail1">Code</label>
      <input type="text" class="form-control" name="code" value="{{ !empty($product) ? $product['code'] : '' }}">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input type="text" class="form-control" name="name" value="{{ !empty($product) ? $product['name'] : '' }}">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Price</label>
      <input type="text" class="form-control" name="price" value="{{ !empty($product) ? $product['price'] : '' }}">
    </div>
    @if(is_null($id))
      <button type="submit" class="btn btn-primary btn-sm">Create Product</button>
    @else
      <button type="submit" class="btn btn-primary btn-sm">Update Product</button>
    @endif
  </form>
@stop