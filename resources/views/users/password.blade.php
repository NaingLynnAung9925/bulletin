@extends('master')
@section('context')
  <form action="{{ route('user.confirm_password') }}" method="POST" class="form-width">
    @csrf
    <div>
      <label for="current_password">Current Password</label>
      <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" id="current_password" value="{{ old('password') }}">
      @error('current_password')
      <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    <div>
      <label for="new_password">New Password</label>
      <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password">
      @error('new_password')
      <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    <div>
      <label for="confirm_password">Confirm New Password</label>
      <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password" name="confirm_password">
      @error('confirm_password')
      <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    <button type="submit" class="mt-3 btn btn-color">Change</button>
  </form>
@endsection
