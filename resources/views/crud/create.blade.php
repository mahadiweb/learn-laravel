<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Laravel CRUD</title>
  </head>
  <body>
    <h1 class="text-center">Laravel CRUD</h1>
    <div class="row">
    	<div class="col-md-3"></div>
    	<div class="card col-md-6">
    		<div class="card-body">

    			@if ($messages = Session::get('msg'))
	        <div class="alert alert-success alert-block">
	         	<strong>{{ $messages }}</strong>
	        </div>
	        @endif

    			<form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
    				@csrf
    				<div class="form-group">
					    <label>Name</label>
					    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name" value="{{ old('name') }}" name="name">
					    @error('name')
							    <strong class="text-danger">{{ $message }}</strong>
							@enderror
					  </div>

					  <div class="form-group">
					    <label>Email address</label>
					    <input type="email" class="form-control @error('name') is-invalid @enderror" placeholder="Enter email" value="{{ old('email') }}" name="email">
					    @error('email')
							    <strong class="text-danger">{{ $message }}</strong>
							@enderror
					  </div>

					  <div class="form-group">
					    <label>Password</label>
					    <input type="password" class="form-control @error('name') is-invalid @enderror" placeholder="Password" name="password">
					    @error('password')
							    <strong class="text-danger">{{ $message }}</strong>
							@enderror
					  </div>

					  <div class="form-group">
						  <label>Image</label>
						  <div class="custom-file">
							  <input type="file" class="custom-file-input @error('name') is-invalid @enderror" id="customFile" value="{{ old('image') }}" name="image">
							  <label class="custom-file-label" for="customFile">Choose file</label>
							  @error('image')
								    <strong class="text-danger">{{ $message }}</strong>
								@enderror
							</div>
						</div>
						
					  <button type="submit" class="btn btn-primary">Submit</button>
					</form>

    		</div>
    	</div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
  </body>
</html>