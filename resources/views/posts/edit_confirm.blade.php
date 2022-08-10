@extends('master')

@section('context')

  <form action="{{ route('post.update', $post['id']) }}" method="POST" class="form-width">
    @method('PUT')
    @csrf
    <div class="">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" class="form-control" value="{{ $post['title'] }}" readonly>
    </div>
    <div>
      <label for="description">Description</label>
      <input type="text" name="description" id="description" class="form-control" value="{{ $post['description'] }}" readonly>
    </div>
    @if ($post['categories'])
    <div>
      <label for="category">Category</label>
      <select name="categories[]" id="category" multiple class="form-select">
        @foreach ($post['categories'] as $category)
          <option value="{{ $category }}" selected>{{ $category }}</option>
        @endforeach
      </select>
    </div>
    @endif
    <button class="btn btn-color mt-3" type="submit">Confirm</button>
  </form>

@endsection
