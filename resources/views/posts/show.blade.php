@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"><h2>{{ __('Read Post') }}</h2></div>
	<div class="col-md-4"><h2>{{ __('Arhives') }}</h2></div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
{{ __('Published on') }} {{ $post->created_at->format('d.m.Y, H:i') }} {{ __('by') }} {{ $post->author->name }}
		</div>
                <div class="card-body">
			<h1 class="card-title">
				{{ $post->Title }}
			</h1>
			<div class="card-text">
				{!! $post->body !!} <br />
			</div>
			<p><a href="{{ route('posts.index') }}">&laquo; {{ __('Back') }}</a></p>
			<hr />
			@include('posts.admin_actions', ['post' => $post])
                </div>
            </div>
        </div>
	<div class="col-md-4">
            @include('posts.archives')
	</div>
    </div>
</div>
@endsection
