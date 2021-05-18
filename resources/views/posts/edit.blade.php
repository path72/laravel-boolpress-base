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


</main>



@endsection