@extends('layouts.app') @section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8 ">
<div class="card">
<div class="card-header">Display all men Clothings</div>
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
@foreach($menclothings as $menclothing)
<tr>
<td>{{$menclothing['categories']}}</td>
<td>{{$menclothing['category']}}</td>
<td>{{$menclothing['colour']}}</td>
<td>{{$menclothing['price']}}</td>
<td><a href="{{route('menclothings.show', ['menclothing' => $menclothing['id'] ] )}}" class="btn btn- primary">Details</a></td>
<td><a href="{{ route('menclothings.edit', ['menclothing' => $menclothing['id']]) }}" class="btn btn- warning">Edit</a></td>
<td>
<form action="{{ action([App\Http\Controllers\MenclothingController::class, 'destroy'], ['menclothing' => $menclothing['id']]) }}" method="post">
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