@extends('master')

@section('context')

<a href="{{ route('post.create') }}" class="btn btn-primary mb-3">Create Post</a>

<table class="table">
  <tr>
    <th>Title</th>
    <th>Description</th>
    <th>Action</th>
  </tr>
  @foreach ($postData as $post)
        
    <tr>
      <td> {{ $post['title'] }}</td>
      <td> {{ $post['description']}} </td>
      <td> 
          <a href="" class="btn btn-secondary">Edit</a>
      </td>
      <td>
          <form action="">
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
          </form>
      </td>
    </tr>
  @endforeach
   
</table>

@endsection