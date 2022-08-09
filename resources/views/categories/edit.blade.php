@extends('master')

@section('context')

<form action="{{ route('category.editConfirm') }}" class="form-width" method="POST">
  @csrf
  <div>
    <input type="hidden" name="id" value="{{ $category->id }}">
    <label for="category_name">Category Name</label>
    <input type="text" class="form-control @error('category_name') isinvalid @enderror" name="category_name" value="{{ $category->category_name }}">
    @error('category_name')
      <p class="alert alert-danger">{{ $message }}</p>
    @enderror
    <button class="btn btn-color mt-3" type="submit">Update</button>
  </div>
</form>

@endsection
