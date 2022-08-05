@extends('master')
@section('context')
  <form action="" class="form-width">
		<div class="image-center">
			<img src="{{ asset($user->image) }}" alt="Profile Image" width="100" height="100" class="rounded-circle">
		</div>
    <div class="">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" class="form-control" value="{{ $user['name'] }}" disabled>
		</div>
		<div class="">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" class="form-control" value="{{ $user['email'] }}" disabled>
		</div>
		@if ($user['type'] === 'Admin')
			<div>
				<label for="type">Type</label>
				<input type="text" name="type" id="type" class="form-control" value="{{ $user['type'] }}" disabled>
			</div>
		@endif
		<div class="">
			<label for="phone">Phone</label>
			<input type="number" name="phone" id="phone" class="form-control" value="{{ $user['phone'] }}" disabled>
		</div>
		<div class="">
			<label for="address">Address</label>
			<input type="textarea" name="address" id="address" class="form-control" value="{{ $user['address'] }}" disabled>
		</div>
		<div class="">
			<label for="dob">Dob</label>
			<input type="date" name="dob" id="dob" class="form-control" value="{{ $user['dob'] }}" disabled>
		</div>
		<a href="{{ route('user.password') }}">Change Password</a>
		
		<a href="{{ route('user.edit', $user->id) }}" class="btn btn-color d-block mt-3">Edit Profile</a>
  </form>

@endsection
