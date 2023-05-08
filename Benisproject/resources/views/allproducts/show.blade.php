@extends('layouts.app') @section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8 ">
<div class="card">
<div class="card-header">Display all Women Clothing</div>
<div class="card-body">
<table class="table table-striped" border="1" >
<tr> <th> <b>Product category </th> <td> {{$womenclothing['categories']}}</td></tr>
<tr> <th>Product Category: </th> <td>{{$womenclothing->category}}</td></tr>
<tr> <th>Product Colour: </th> <td>{{$womenclothing->colour}}</td></tr>
<tr> <th>Product Price: </th> <td>£{{$womenclothing->price}}</td></tr>
<tr> <th>Products Information: </th> <td style="max-width:150px;" >{{$womenclothing->description}}</td></tr>
<tr> <td colspan='2' ><img style="width:100%;height:100%" src="{{ asset('storage/images/'.$womenclothing->image)}}"></td></tr>
</table>
<table><tr>
<td><a href="{{route('womenclothings.index')}}" class="btn btn-primary" role="button">Back to the list</a></td>
<td><a href="{{ route('womenclothings.edit', ['womenclothing' => $womenclothing['id']]) }}" class="btn btn- warning">Edit</a></td>
<td><form action="{{ route('womenclothings.destroy', ['womenclothing' => $womenclothing['id']]) }}" method="post"> @csrf
<input name="_method" type="hidden" value="DELETE">
<button class="btn btn-danger" type="submit">Delete</button>
</form></td>
</tr></table>
</div>
</div>
</div>
</div>
</div> @endsection