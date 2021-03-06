@extends('backend.layouts.master')

@section('content')
<div class="main-panel">

  <div class="content-wrapper">

    <div class="card">
      <div class="card-header">
        Add Product
      </div>

      <div class="card-body">
        <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
        {{ @csrf_field() }}

        @include('backend.partials.messages')

          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
          </div>

          <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" placeholder="Price">
          </div>

          <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" name="quantity" placeholder="Quantity">
          </div>

          <div class="form-group">
            <label for="category">Select category</label>
            <select class="form-control" name="category_id" id="category">
              <option value="">Select category for product</option>
              @foreach (App\Models\Category::orderBy('name', 'asc')-> where('parent_id', NULL)->get() as $parent)
                <option value="{{ $parent-> id}}">{{$parent -> name}}</option>

                  @foreach (App\Models\Category::orderBy('name', 'asc')-> where('parent_id', $parent->id)->get() as $child)
                   <option value="{{ $child-> id}}">------->{{$child -> name}}</option>

               @endforeach  

              @endforeach
            </select>
          </div>

            <div class="form-group">
            <label for="brand">Select brand</label>
            <select class="form-control" name="brand_id" id="brand">
              <option value="">Select brand for product</option>
              @foreach (App\Models\Brand::orderBy('name', 'asc')->get() as $brand)
                <option value="{{ $brand-> id}}">{{$brand -> name}}</option>
              @endforeach
            </select>
          </div>

            <div class="form-group">
              <label for="product_image">Product Image</label>

              <div class="row">
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
              </div>
            </div>

          <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
      </div>

    </div>

  </div>

</div>
@endsection
<!-- main-panel ends -->
