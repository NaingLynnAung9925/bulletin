@extends('master')

@section('context')

<a href="{{ route('category.create') }}" class="btn btn-color">Create</a>

<table class="table mt-3 table-striped table-hover table-dark">
  <tr>
    <th>Category Name</th>
    <th>Action</th>
  </tr>
  @foreach ($categories as $category)
    <tr>
      <td>{{ $category->category_name }}</td>
      <td>
        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
        <form action="{{ route('category.destroy', $category->id) }}" class="d-inline">
          @method('DELETE')
        <button class="btn btn-sm btn-outline-danger ms-3" type="submit">Delete</button>
        </form>
      </td>
      
    </tr>
  @endforeach
</table>

@endsection
