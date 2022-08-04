@extends('master')

@section('context')

  <form action="{{ route('post.edit_confirm') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $post->id }}">
    <div class="">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
      @error('title')
        <p class="alert alert-danger form-control">{{$message}}</p>
      @enderror
    </div>
    <div>
      <label for="description">Description</label>
      <input type="text" name="description" id="description" class="form-control" value="{{ $post->description }}">
      @error('description')
      <p class="alert alert-danger form-control">{{$message}}</p>
    @enderror
    </div>
    <button class="btn btn-primary mt-3" type="submit">Edit</button>
  </form>

@endsection
