@extends('layouts.app')

@section('title', 'Edit Post')
@section('main_content')

{{-- 
	UPDATE -> edit()
	single Model record (DB table row) is available here  
	via ModelController@edit
--}}
{{-- @dump($post) --}}

<main>

	<div class="title_bar">
		<h4>Edit Post</h4>
	</div>

	{{-- VALIDATION error management --}}
	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<!--
		STORE (laravel method: PUT, html method: POST)
	-->
	<form action="{{route('posts.update',$post->id)}}" method="post">

		@csrf 			{{-- token laravel --}}
		@method('PUT')	{{-- PUT: modifica intero record in DB // PATCH: modifica singola colonna --}}

		<div class="db_columns">
			{{-- ! input name = nome colonna DB ! --}}
			{{-- old() trattengo i valori precedenti in caso di mancata validazione (in variabili d'ambiante) --}}
			<div class="form-group row">
				<label>Author</label>
				<input type="text" class="form-control" name="author" placeholder="Author" value="{{$post['author']}}">	
			</div>
			<div class="form-group row">
				<label>Date</label>
				<input type="date" class="form-control" name="date" placeholder="Date" value="{{$post['date']}}">	
			</div>
			<div class="form-group row">
				<label>Title</label>
				<input type="text" class="form-control" name="title" placeholder="Title" value="{{$post['title']}}">	
			</div>
			<div class="form-group row">
				<label>Text</label>
				<textarea class="form-control" name="text" rows="4" cols="50">{{$post['text']}}</textarea>
			</div>
			<input type="submit"  class="btn btn-primary" value="Update">
		</div>

	</form>

</main>

@endsection