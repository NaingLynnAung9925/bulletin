@extends('master')
@section('context')

<form action="{{ route('user.update', $user['id']) }}" enctype="multipart/form-data" method="POST">
  @method('PUT')
  @csrf
  <div class="">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ $user['name'] }}" readonly >
    @error('name')
      <p class="alert alert-danger form-control">{{ $message }}</p>
    @enderror
  </div>
  <div class="">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control" value="{{ $user['email'] }}" readonly>
    @error('email')
      <p class="alert alert-danger form-control">{{ $message }}</p>
    @enderror
  </div>
  @if ($user['type'] === 'Admin')
    <div>
      <label for="type">Type</label>
      <select name="type" class="form-control" readonly>
        <option value="{{ $user['type'] }}">{{ $user['type'] }}</option>
      </select>
    </div>
  @endif
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
  <div>
    <label for="image">Profile</label>
    <input type="text" name="image" id="image" class="form-control" value="{{ $user['image'] }}" readonly>
  </div>
  <div class="mt-3">
    
    <button class="btn btn-primary" type="submit">Confirm</button>
  </div>
</form>

@endsection

