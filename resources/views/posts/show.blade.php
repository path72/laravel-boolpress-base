@extends('layouts.app')

@section('title', 'Post Detail')
@section('main_content')

{{-- 
	READ -> show()
	single Model record (DB table row) is available here  
	via ModelController@show
--}}
{{-- @dump($post) --}}

<main>
	<h4>Post Detail</h4>

	<div class="card">
		<div class="post_header">
			<h5>{{$post['title']}}</h5>
			<p>{{$post['author']}}, {{$post['date']}}</p>
			<p>{{$post['text']}}</p>
		</div>
	</div>

</main>

@endsection