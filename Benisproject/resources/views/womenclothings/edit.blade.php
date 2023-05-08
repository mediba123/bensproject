@extends('layouts.app') @section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8 ">
<div class="card">
<div class="card-header">Edit and update the Products</div> @if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li> @endforeach
</ul>
</div><br /> @endif
@if (\Session::has('success'))
<div class="alert alert-success">
<p>{{ \Session::get('success') }}</p>
</div><br /> @endif
<div class="card-body">
<form class="form-horizontal" method="POST" 
action="{{ route('womenclothings.update',
['womenclothing' => $womenclothing['id']]) }}" enctype="multipart/form-data" >
@method('PATCH')
@csrf
<div class="col-md-8">
<label >Product category:</label>
<input type="text" name="categories" value="{{$womenclothing->categories}}"/>
</div>
<div class="col-md-8">
<label>Product Type:</label>
<select name="category" value="{{ $womenclothing->category }}">
<option value="Women clothing">Women clothings</option>
<option value="Men clothing">Men Clothing</option>
<option value="Slippers">Slippers</option>
<option value="Bags">Bags</option>
<option value="Accessories">Accessories</option>
</select>
</div>
<div class="col-md-8">
<label >Colour:</label>
<input type="text" name="colour" value="{{$womenclothing->colour}}" />
</div>
<div class="col-md-8">
<label>Price:</label>
<input type="text" name="price" value="{{$womenclothing->price}}" />
</div>
<div class="col-md-8">
<label >Description:</label>
<textarea rows="4" cols="50" name="description" > {{$womenclothing->description}}
</textarea>
</div>
<div class="col-md-8">
<label>Image:</label>
<input type="file" name="image" />
</div>
<div class="col-md-6 col-md-offset-4">
<input type="submit" class="btn btn-primary" />
<input type="reset" class="btn btn-primary" />
</a>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
 @endsection