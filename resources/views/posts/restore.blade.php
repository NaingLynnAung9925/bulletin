@extends('master')

@section('context')



<table class="table">
  <tr>
    <th>Title</th>
    <th>Description</th>
    <th>Action</th>
  </tr>
 
  @foreach ($post as $post)
    <tr>
      <td>{{ $post->title }}</td>
      <td>{{ $post->description }}</td>
      <td>
        <a href="{{ route('post.restoreItem', $post->id) }}" class="btn btn-outline-secondary">Restore</a>
      </td>
    </tr>
  @endforeach

</table>
<a href="{{ route('post.index') }}" class="btn btn-dark">Back</a>

@endsection
