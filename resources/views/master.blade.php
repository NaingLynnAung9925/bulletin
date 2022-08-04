<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Bulletin Board</title>

	<link rel="stylesheet" href="/css/app.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>

	<nav class="navbar navbar-expand-lg bg-light px-5">
		<div class="container-fluid">
			<a class="navbar-brand" href="{{ route('post.index') }}">BULLETINBOARD</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					@if (Auth::user()->type == '0')
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="{{ route('user.index') }}">Users List</a>
					</li>
					@endif
					<li class="nav-item">
						<a class="nav-link " href="{{ route('post.index') }}">Posts List</a>
					</li>
				</ul>
				<a class="nav-link" href="{{ route('user.user_detail', Auth::user()->id) }}">User Profile</a>
				<a href="{{ route('user.logout') }}" class="btn btn-sm btn-danger float-right ms-4">Logout</a>
				
			</div>
		</div>
	</nav>
    
	<div class="container mt-5">

		@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		@endif

		@yield('context')
	</div>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
