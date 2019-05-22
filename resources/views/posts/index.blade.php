@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"><h1>{{ __('Posts') }}</h1></div>
	<div class="col-md-4"><h2>{{ __('Arhives') }}</h2></div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
	@foreach ($posts as $post)
            <div class="card">
                <div class="card-header">
{{ __('Published on') }} {{ $post->created_at->format('d.m.Y, H:i') }} {{ __('by') }} {{ $post->author->name }}
		</div>
                <div class="card-body">
			<h3 class="card-title">
				<a href="{{ route('posts.show', $post->id) }}">
					{{ $post->Title }}
				</a>
			</h3>
			<h6 class="card-subtitle">
				
			</h6>
			<div class="card-text">
				{!! $post->excerpt !!} <br />
				<a href="{{ route('posts.show', $post->id) }}">{{ __('Read more') }}</a>
			</div>
			<hr />
			@include('posts.admin_actions', ['post' => $post])
                </div>
            </div>
	@endforeach
        </div>
	<div class="col-md-4">
            @include('posts.archives')
	</div>
    </div>
</div>
@endsection
