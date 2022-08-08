@extends('master')

@section('context')

<div class="">
  <a href="{{ route('post.importFile') }}" class="btn btn-primary me-3">Import</a>
  <a href="{{ route('post.export') }}" class="btn btn-dark">Export</a>

  @if (Auth::user()->type == '0')
    <a href="{{ route('post.restoreAll') }}" class="btn btn-dark float-end  ms-3">Trashed List</a>
  @endif
  <div class="row float-end">
    <form class="d-flex" role="search" action="{{ route('post.search') }}">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{request('search')}}">
      <button class="btn btn-outline-secondary" type="submit">Search</button>
    </form>
  </div>
</div>

<table class="table mt-3 table-striped table-hover table-dark">
  <caption>List of Posts</caption>
  <tr>
    <th>Title</th>
    <th>Description</th>
    <th>Created User Name</th>
    <th>Action</th>
  </tr>
  @foreach ($postData as $post)
        
    <tr>
      <td> {{ $post['title'] }}</td>
      <td> {{ $post['description']}} </td>
      <td> {{ $post->user->name }}</td>
      <td>
        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-outline-secondary d-inline me-3">Edit</a>
          <form action="{{ route('post.destroy', $post->id) }}" class="d-inline">
            @method('DELETE')
            <button class="btn btn-outline-danger btn-sm" type="submit">Delete</button>
          </form>
      </td>
    </tr>
  @endforeach

   
</table>

<div class="d-flex justify-content-center align-items-center">
  {{ $postData->links() }}
</div>

<a href="{{ route('post.create') }}" class="btn btn-color">Create Post</a>

@endsection
