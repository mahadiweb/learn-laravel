<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Laravel CRUD</title>
  </head>
  <body>


        <!-- Image and text -->
				<nav class="navbar navbar-expand navbar-light bg-light">
					<div class="container">
					  <a class="navbar-brand" href="{{ url('/') }}">
					    <img src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
					    CRUD
					  </a>

					  <ul class="navbar-nav float-right">
					  		<li class="nav-item dropdown">
					        <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					          {{ Auth::user()->name }}
					        </a>
					        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					          <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
					        </div>
					      </li>
					  </ul>

				  </div>
				</nav>
{{--roleHas("admin.home")--}}

    <h1 class="text-center">Laravel CRUD <a href="{{ url('/crud') }}">M</a></h1>

@if(roleHas("admin.home"))
    <div class="row">
    	<div class="col-md-3"></div>
    	<div class="card col-md-6">
    		<div class="card-body">
    			<a href="{{ route('create') }}" class="btn btn-success w-30 my-2 align-left">New</a>
    			<table class="table">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Name</th>
				      <th scope="col">Email</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $no = 1 ?>
				  	@foreach($datas as $data)
				    <tr>
				      <th scope="row">{{$no++}}</th>
				      <td>{{$data->name}}</td>
				      <td>{{$data->email}}</td>
				      <td><a href="{{ route('edit',$data->id) }}" class="btn btn-primary">Edit</a>&nbsp<a href="{{ route('delete',$data->id) }}" class="btn btn-danger">Delete</a></td>
				    </tr>
				    @endforeach
				  </tbody>
				</table>
    		</div>
    	</div>
    </div>
@endif

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
  </body>
</html>