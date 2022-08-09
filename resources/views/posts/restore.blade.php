@extends('master')

@section('context')
<table class="table table-striped table-hover table-dark">
  <tr>
    <th>Title</th>
    <th>Description</th>
    <th>Action</th>
  </tr>
 
  @foreach ($posts as $post)
    <tr>
      <td>{{ $post->title }}</td>
      <td>{{ $post->description }}</td>
      <td>
        <a href="{{ route('post.restoreItem', $post->id) }}" class="btn btn-sm btn-outline-secondary">Restore</a>
        <form action="{{ route('post.delete', $post->id) }}" class="d-inline" method="GET">
          @method('DELETE')
          <button class="btn btn-outline-danger btn-sm" type="submit">Delete</button>
        </form>
      </td>
    </tr>
  @endforeach
</table>

  {{ $posts }}

<a href="{{ route('post.index') }}" class="btn btn-dark">Back</a>
@endsection
