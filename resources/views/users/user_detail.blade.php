@extends('master')
@section('context')
  <form action="" >
    <div class="">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" class="form-control" value="{{ $user['name'] }}" readonly>
		</div>
		<div class="">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" class="form-control" value="{{ $user['email'] }}" readonly>
		</div>
		<div>
			<label for="type">Type</label>
			<input type="text" name="type" id="type" class="form-control" value="{{ $user['type'] }}" readonly>
		</div>
		<div class="">
			<label for="phone">Phone</label>
			<input type="number" name="phone" id="phone" class="form-control" value="{{ $user['phone'] }}" readonly>
		</div>
		<div class="">
			<label for="address">Address</label>
			<input type="textarea" name="address" id="address" class="form-control" value="{{ $user['address'] }}" readonly>
		</div>
		<div class="">
			<label for="dob">Dob</label>
			<input type="date" name="dob" id="dob" class="form-control" value="{{ $user['dob'] }}" readonly>
		</div>
  </form>
	<a href="" class="btn btn-primary mt-3">Edit Profile</a>
@endsection