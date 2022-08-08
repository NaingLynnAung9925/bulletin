@extends('master')

@section('context')
@foreach ($errors->all() as $message) 

<p>{{ $message }}</p>

@endforeach

  <form action="{{ route('post.import') }}" method="POST" enctype="multipart/form-data" class="form-width">
    @csrf
    <h2 class="">Upload CSV File</h2>
    <input type="file" name="import_file" class="my-5 form-control @error('import_file') is-invalid @enderror">
    @error('import_file')
      <p class="alert alert-danger"> {{ $message }} </p>
    @enderror
    <button type="submit" class="btn btn-color">Import File</button>
  </form>
@endsection
