@extends('layouts.app') @section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8 ">
<div class="card">
<div class="card-header">Display all Women Clothings</div>
<div class="card-body">
<table class="table table-striped">
<thead>
<tr>
<th>Categories</th>
<th>Category</th>
<th>Colour</th>
<th>Price</th>
<th colspan="3">Action</th>
</tr>
</thead>
<tbody>
@foreach($womenclothings as $womenclothing)
<tr>
<td>{{$womenclothing['categories']}}</td>
<td>{{$womenclothing['category']}}</td>
<td>{{$womenclothing['colour']}}</td>
<td>{{$womenclothing['price']}}</td>
<td><a href="{{route('womenclothings.show', ['womenclothing' => $womenclothing['id'] ] )}}" class="btn btn- primary">Details</a></td>
<td><a href="{{ route('womenclothings.edit', ['womenclothing' => $womenclothing['id']]) }}" class="btn btn- warning">Edit</a></td>
<td>
<form action="{{ action([App\Http\Controllers\WomenclothingController::class, 'destroy'], ['womenclothing' => $womenclothing['id']]) }}" method="post">
@csrf
<input name="_method" type="hidden" value="DELETE">
<button class="btn btn-danger" type="submit"> Delete</button>
</form>
</td>
</tr> @endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</div> @endsection