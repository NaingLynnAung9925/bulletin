@extends('master')

@section('context')

<a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Create User</a>

  <table class="table">
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Image</th>
      <th>Type</th>
      <th>Phone</th>
      <th>Address</th>
      <th>Date of Birth</th>
    </tr>
    @foreach ($users as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          <img src="{{ asset($user->image) }}" alt="" width="50" height="50">
        </td>
        @if ($user->type == '0')
          <td>
            {{ $user->type = 'Admin' }}
          </td>
          @elseif ($user->type == '1')
          <td>
            {{$user->type = 'User'}}
          </td>
        @endif
        <td>{{ $user->phone }}</td>
        <td>{{ $user->address }}</td>
        <td>{{ $user->dob }}</td>
        <td>
          <form action="">
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </table>
@endsection