@extends('master')

@section('context')

  <form action="{{ route('post.edit_confirm') }}" method="POST" class="form-width">
    @csrf
    <input type="hidden" name="id" value="{{ $post->id }}">
    <div class="">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $post->title }}">
      @error('title')
        <p class="text-danger">{{$message}}</p>
      @enderror
    </div>
    <div>
      <label for="description">Description</label>
      <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ $post->description }}">
      @error('description')
      <p class="text-danger">{{$message}}</p>
    @enderror
    </div>
    <div class="mt-3">
      <a href="{{ route('post.index') }}" class="btn btn-dark">Back</a>
      <button class="btn btn-color" type="submit">Edit</button>
    </div>
  </form>

@endsection
