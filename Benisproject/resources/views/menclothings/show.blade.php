@extends('layouts.app') @section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8 ">
<div class="card">
<div class="card-header">Display all men Clothing</div>
<div class="card-body">
<table class="table table-striped" border="1" >
<tr> <th> <b>Product category </th> <td> {{$menclothing['categories']}}</td></tr>
<tr> <th>Product Category: </th> <td>{{$menclothing->category}}</td></tr>
<tr> <th>Product Colour: </th> <td>{{$menclothing->colour}}</td></tr>
<tr> <th>Product Price: </th> <td>£{{$menclothing->price}}</td></tr>
<tr> <th>Products Information: </th> <td style="max-width:150px;" >{{$menclothing->description}}</td></tr>
<tr> <td colspan='2' ><img style="width:100%;height:100%" src="{{ asset('storage/images/'.$menclothing->image)}}"></td></tr>
</table>
<table><tr>
<td><a href="{{route('menclothings.index')}}" class="btn btn-primary" role="button">Back to the list</a></td>
<td><a href="{{ route('menclothings.edit', ['menclothing' => $menclothing['id']]) }}" class="btn btn- warning">Edit</a></td>
<td><form action="{{ route('menclothings.destroy', ['menclothing' => $menclothing['id']]) }}" method="post"> @csrf
<input name="_method" type="hidden" value="DELETE">
<button class="btn btn-danger" type="submit">Delete</button>
</form></td>
</tr></table>
</div>
</div>
</div>
</div>
</div> @endsection