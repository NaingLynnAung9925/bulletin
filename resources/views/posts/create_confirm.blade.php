@extends('master')

@section('context')

	<form action="{{ route('post.store') }}" method="POST">
			@csrf
			<div class="">
				<label for="title">Title</label>
				<input type="text" id="title" name="title" class="form-control" value="{{ $createData['title'] }}" readonly> 
			</div>
			<div class="">
				<label for="description">Description</label>
				<input type="text" id="description" name="description" class="form-control" value="{{ $createData['description'] }}" readonly> 
			</div>
			
			<button type="submit" class="btn btn-primary mt-3">Create</button>
	</form>

@endsection