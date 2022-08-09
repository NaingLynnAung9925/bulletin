@extends('master')

@section('context')

  <form action="{{ route('post.import') }}" method="POST" enctype="multipart/form-data" class="form-width">
    @csrf
    <h2 class="">Upload CSV File</h2>
    <input type="file" name="import_file" class="mt-5 mb-2 form-control @error('import_file') is-invalid @enderror">
    @error('import_file')
      <p class="alert alert-danger"> {{ $message }} </p>
    @enderror
    <button type="submit" class="btn btn-color mt-5">Import File</button>
  </form>
@endsection
