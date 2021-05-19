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

	<div class="title_bar">
		<h4>Post Detail</h4>
	</div>

	<div class="card">
		<div class="post_show">
			<div class="post_header">
				<div class="txt_title">{{$post['title']}}</div>
				<div class="txt_subtitle">{{$post['author']}}, {{date('l, F j Y H:i', strtotime($post['date']))}}</div>
			</div>
			<div class="post_body">
				@php $pars = preg_split("/\r\n|\n|\r/", $post['text']); @endphp
				@foreach ($pars as $par)			
					<p>{{$par}}</p>
				@endforeach
			</div>
		</div>
	</div>

</main>

@endsection