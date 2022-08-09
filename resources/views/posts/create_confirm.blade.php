@extends('master')

@section('context')

	<form action="{{ route('post.store') }}" method="POST" class="form-width">
			@csrf
			<h2>Post Confirm</h2>
			<div class="">
				<label for="title">Title</label>
				<input type="text" id="title" name="title" class="form-control" value="{{ $createData['title'] }}" readonly> 
			</div>
			<div class="">
				<label for="description">Description</label>
				<input type="text" id="description" name="description" class="form-control" value="{{ $createData['description'] }}" readonly> 
			</div>
			<div>
				<label for="catgories">Category List :</label>
				<select name="categories[]" id="" class="form-control" multiple >
					@foreach ($createData['categories'] as $category)
					<option value="{{ $category }}" selected>{{ $category }}</option>
					@endforeach
				</select>
			</div>
			
			<button type="submit" class="btn btn-color mt-3">Confirm</button>
	</form>

@endsection
