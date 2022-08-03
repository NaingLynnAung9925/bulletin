@extends('master')

@section('context')

	<form action="{{ route('user.create_confirm')}}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
			@error('name')
      <p class="alert alert-danger form-control">{{ $message }}</p>
    @enderror
		</div>
		<div class="">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
			@error('email')
      <p class="alert alert-danger form-control">{{ $message }}</p>
    @enderror
		</div>
		<div class="">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
			@error('password')
      <p class="alert alert-danger form-control">{{ $message }}</p>
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
			<input type="file" name="image" id="image" class="form-control">
		</div>
		<button class="btn btn-primary mt-3" type="submit">Confirm</button>

	</form>

@endsection