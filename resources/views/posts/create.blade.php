@extends('master')

@section('context')

	<form action="{{ route('post.create_confirm') }}" method="POST">
		@csrf
		<div class="">
			<label for="title">Title</label>
			<input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
			@error('title')
				<p class="alert alert-danger form-control">{{ $message }}</p>
			@enderror
		</div>
		<div class="">
			<label for="description">Description</label>
			<input type="text" id="description" name="description" class="form-control" value="{{ old('description') }}">
			@error('description')
				<p class="alert alert-danger form-control">{{ $message }}</p>
			@enderror
		</div>
		
		<button type="submit" class="btn btn-primary mt-3">Confirm</button>
	</form>

@endsection