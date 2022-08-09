@extends('master')

@section('context')

	<form action="{{ route('post.create_confirm') }}" method="POST" class="form-width">
		@csrf
		<h2>Create Post</h2>
		<div class="">
			<label for="title">Title</label>
			<input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
			@error('title')
				<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>
		<div class="">
			<label for="description">Description</label>
			<input type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}">
			@error('description')
				<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>
		<div class="">
			<label for="categories">Categories</label>
			<select name="categories[]" id="categories" class="form-select" multiple>
				<option value="" selected>Select Category</option>
				@foreach ($categories as $category)
					<option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
				@endforeach
			</select>
		</div>
		
		<button type="submit" class="btn btn-color mt-3">Create</button>
	</form>

@endsection
