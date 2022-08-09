@extends('master')

@section('context')

<form action="{{ route('category.createConfirm') }}" class="form-width" method="POST">
  @csrf
  <div>
    <label for="name">Category Name</label>
    <input type="text" name="category_name" id="name" class="form-control">
    @error('category_name')
      <p class="alert alert-danger">{{ $message }}</p>
    @enderror
  </div>
  <button class="btn btn-color mt-3" type="submit">Create</button>
</form>

@endsection
