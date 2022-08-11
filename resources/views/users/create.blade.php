@extends('master')

@section('context')

	<form action="{{ route('user.create_confirm')}}" method="POST" enctype="multipart/form-data" class="form-width">
		@csrf
		<div class="image-center">
			<img src="{{ asset('images/profile.png') }}" alt="Profile Image" width="100" height="100" class="rounded-circle" id="image">
		</div>
		<div class="">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
			@error('name')
      <p class="text-danger">{{ $message }}</p>
    @enderror
		</div>
		<div class="">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
			@error('email')
      <p class="text-danger">{{ $message }}</p>
    @enderror
		</div>
		<div class="">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
			@error('password')
      	<p class="text-danger">{{ $message }}</p>
   	 	@enderror
		</div>
		<div class="">
			<label for="cpassword">Confirm Password</label>
			<input type="password" name="confirm_password" id="cpassword" class="form-control @error('confirm_password') is-invalid @enderror" >
			@error('confirm_password')
      	<p class="text-danger">{{ $message }}</p>
   	 	@enderror
		</div>
		<div>
			<label for="type">Type</label>
			<select name="type" class="form-control">
				<option value="User" selected>User</option>
				<option value="Admin">Admin</option>
			</select>
		</div>
		<div class="">
			<label for="phone">Phone</label>
			<input type="number" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
		</div>
		<div class="">
			<label for="address">Address</label>
			<input type="textarea" name="address" id="address" class="form-control" value="{{ old('address') }}">
		</div>
		<div class="">
			<label for="dob">Dob</label>
			<input type="date" name="dob" id="dob" class="form-control" value="{{ old('dob') }}">
		</div>
		<div>
			<label for="image">Profile</label>
			<input type="file" name="image" id="image" class="form-control" onchange="readURL(this)">
		</div>
		<div class="mt-3">
			<a href="{{ route('user.index') }}" class="btn btn-dark">Back</a>
			<button class="btn btn-color" type="submit">Create</button>
		</div>

	</form>

@endsection
