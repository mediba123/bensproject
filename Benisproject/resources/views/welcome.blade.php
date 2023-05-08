<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>House of Nana</title>

    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body class="antialiased">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                    @if (Route::has('login'))
                    @auth
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/home') }}">Home</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Login</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('register') }}">Register</a>
                    </li>
                    @endif
                    @endauth
                    @endif
                </ul>


                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    </div>

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

</body>

</html>