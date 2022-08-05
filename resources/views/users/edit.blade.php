@extends('master')

@section('context')
  <form action="{{ route('user.edit_confirm') }}" method="POST" enctype="multipart/form-data" class="form-width">
    @csrf
		<div class="image-center">
			<img src="{{ asset($user->image) }}" alt="Profile Image" width="100" height="100" class="rounded-circle">
		</div>
    <input type="hidden" name="id" value="{{ $user->id }}">
    <div class="">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
			@error('name')
        <p class="text-danger">{{ $message }}</p>
      @enderror
		</div>
		<div class="">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
			@error('email')
        <p class="text-danger">{{ $message }}</p>
      @enderror
		</div>
    @if ($user->type === '0')
      <div>
        <label for="type">Type</label>
        <select name="type" class="form-control">
          <option value="Admin" selected>Admin</option>
          <option value="User" >User</option>
        </select>
      </div>
      @elseif ($user->type == '1')
      <input type="hidden" name="type" value="{{$user->type}}">
    @endif
		<div class="">
			<label for="phone">Phone</label>
			<input type="number" name="phone" id="phone" class="form-control" value="{{ $user->phone }}">
		</div>
		<div class="">
			<label for="address">Address</label>
			<input type="textarea" name="address" id="address" class="form-control" value="{{ $user->address }}">
		</div>
		<div class="">
			<label for="dob">Dob</label>
			<input type="date" name="dob" id="dob" class="form-control" value="{{ $user->dob }}">
		</div>
		<div>
			<label for="image">Profile</label>
			<input type="file" name="image" id="image" class="form-control" value="{{ $user->image }}">
		</div>
		<button class="btn btn-color mt-3" type="submit">Update</button>
  </form>
@endsection
