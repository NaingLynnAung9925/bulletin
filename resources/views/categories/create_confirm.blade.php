@extends('master')

@section('context')

<form action="{{ route('category.store') }}" class="form-width" method="POST">
  @csrf
  <div>
    <label for="name">Category Name</label>
    <input type="text" name="category_name" id="name" class="form-control" value="{{ $category['category_name'] }}" readonly>
  </div>
  <button class="btn btn-color mt-3" type="submit">Confirm</button>
</form>

@endsection
