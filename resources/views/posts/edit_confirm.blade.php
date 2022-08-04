@extends('master')

@section('context')

  <form action="{{ route('post.update', $post['id']) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" class="form-control" value="{{ $post['title'] }}">
    </div>
    <div>
      <label for="description">Description</label>
      <input type="text" name="description" id="description" class="form-control" value="{{ $post['description'] }}">
    </div>
    <button class="btn btn-primary mt-3" type="submit">Confirm</button>
  </form>

@endsection
