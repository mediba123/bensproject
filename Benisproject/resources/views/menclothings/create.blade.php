<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
 <div class="row justify-content-center">
<div class="col-md-10 ">
 <div class="card">
 <div class="card-header">Add new Men clothe</div>
<!-- display the errors -->
@if ($errors->any())
<div class="alert alert-danger">
<ul> @foreach ($errors->all() as $error)
<li>{{ $error }}</li> @endforeach
</ul>
</div><br /> @endif
<!-- display the success status -->
@if (\Session::has('success'))
<div class="alert alert-success">
<p>{{ \Session::get('success') }}</p>
</div><br /> @endif
 <!-- define the form -->
<div class="card-body">
<form class="form-horizontal" method="POST"
action="{{url('menclothings') }}" enctype="multipart/form-data">
@csrf
 <div class="col-md-8">
 <label >Clothing category</label>
<input type="text" name="categories"
placeholder="men clothing registering" />
 </div>
 <div class="col-md-8">
 <label>product type</label>
<select name="category" >
<option value="Women clothing">Women Clothing</option>
<option value="Men clothing">Men Clothing</option>
<option value="Slippers">Slippers</option>
<option value="Bags">Bags</option>
<option value="Accessories">Accessories</option>
</select>
</div>
<div class="col-md-8">
<label >Colour</label>
<input type="text" name="colour"
placeholder="Product colour" />
</div>
<div class="col-md-8">
<label >Price</label>
<input type="text" name="price"
placeholder="Product price" />
</div>
<div class="col-md-8">
<label >Description</label>
<textarea rows="4" cols="50" name="description"> Notes about the
products </textarea>
</div>
<div class="col-md-8">
<label>Image</label>
<input type="file" name="image"
placeholder="Image file" />
</div>
<div class="col-md-6 col-md-offset-4">
<input type="submit" class="btn btn-primary" />
<input type="reset" class="btn btn-primary" />
</div>
 </form>
 </div>
 </div>
 </div>
</div>
</div>
@endsection
