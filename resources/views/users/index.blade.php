@extends('master')

@section('context')


<a href="{{ route('user.create') }}" class="btn mb-3 btn-color">Create User</a>
<div class="row float-end">
  <form class="d-flex" role="search" action="{{ route('user.search') }}">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{request('search')}}">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>
</div>

  <table class="table table-striped table-hover table-dark">
    <caption>List of users</caption>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Image</th>
      <th>Type</th>
      <th>Phone</th>
      <th>Address</th>
      <th>Date of Birth</th>
      <th>Action</th>
    </tr>
    @foreach ($users as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          <img src="{{ asset($user->image) }}" alt="" width="50" height="50" class="rounded-circle">
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
          <form action="{{ route('user.destroy', $user->id) }}">
            @method('DELETE')
            <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </table>
  <div class="d-flex justify-content-center align-items-center">
    {{ $users->links() }}
  </div>


@endsection
