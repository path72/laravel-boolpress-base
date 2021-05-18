@extends('layouts.app')

@section('title', 'New Post')
@section('main_content')

{{-- 
	CREATE -> create()
	no Model data available here  
	via ModelController@create
--}}

<main>

	<div class="title_bar">
		<h4>New Post</h4>
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
		STORE (laravel method: POST, html method: POST)
	-->
	<form action="{{route('posts.store')}}" method="post">

		@csrf 			{{-- token laravel --}}
		@method('POST') {{-- POST: inserimento record in DB --}}

		<div class="db_columns">
			{{-- ! input name = nome colonna DB ! --}}
			{{-- old() trattengo i valori precedenti in caso di mancata validazione (in variabili d'ambiante) --}}
			<div class="form-group row">
				<label>Author</label>
				<input type="text" class="form-control" name="author" placeholder="Author" value="{{old('author')}}">	
			</div>
			<div class="form-group row">
				<label>Date</label>
				<input type="date" class="form-control" name="date" placeholder="Date" value="{{old('date')}}">	
			</div>
			<div class="form-group row">
				<label>Title</label>
				<input type="text" class="form-control" name="title" placeholder="Title" value="{{old('title')}}">	
			</div>
			<div class="form-group row">
				<label>Text</label>
				<textarea class="form-control" name="text" rows="4" cols="50">{{old('text')}}</textarea>
			</div>
			<input type="submit"  class="btn btn-primary" value="Post">
		</div>

	</form>

</main>

@endsection