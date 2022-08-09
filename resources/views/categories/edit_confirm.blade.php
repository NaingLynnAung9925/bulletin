@extends('master')

@section('context')

<form action="{{ route('category.update', $category['id']) }}" class="form-width" method="POST">
  @method('PUT')
  @csrf
  <div>
    <label for="category_name">Category Name</label>
    <input type="text" class="form-control" name="category_name" value="{{ $category['category_name'] }}" readonly>
    <button class="btn btn-color mt-3" type="submit">Confirm</button>
  </div>
</form>

@endsection
