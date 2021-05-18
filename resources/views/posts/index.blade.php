@extends('layouts.app')

@section('title', 'Posts')
@section('main_content')

{{-- 
	READ -> index()
	all Model data (whole DB table) are available here  
	via ModelController@index
--}}
{{-- @dump($posts) --}}

<main>

	<div class="title_bar">
		<h4>Posts</h4>
		<!--
			CREATE (laravel method: GET)
		-->
		<a href="{{route('posts.create')}}" class="btn btn-primary">New Post</a>
	</div>

	{{-- REDIRECT message management --}}
	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif

	@if ($posts->toArray())

		@foreach ($posts as $post)
			<div class="card">
				<div class="post_header">
					<h5>{{$post['title']}}</h5>
					<p>{{$post['author']}}, {{$post['date']}}</p>
				</div>
				<div class="actions">
					<!--
						SHOW (laravel method: GET) 
					-->
					<a href="{{route('posts.show',['post'=>$post['id']])}}"><button type="button" class="btn btn-info">Read</button></a>
					<!--
						EDIT (laravel method: GET)
					-->
					<a href="{{route('posts.edit',['post'=>$post['id']])}}"><button type="button" class="btn btn-warning">Edit</button></a>
					<!--
						DELETE (laravel method: DELETE, html method: POST)
					-->
					<form action="{{route('posts.destroy',['post'=>$post['id']])}}" method="post">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger">Delete</button>
					</form>
				</div>
			</div>			
		@endforeach

	@endif

</main>

@endsection