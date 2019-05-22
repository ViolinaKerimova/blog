@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"><h1>{{ __('Edit Post') }}</h1></div>
	<div class="col-md-4"><h2>{{ __('Arhives') }}</h2></div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
		</div>
                <div class="card-body">
			<form method="post" action="{{ $action }}">
			@method($method)
			@csrf
			<div class="form-group">
				<label for="title" class="control-label">{{ __('Title') }}</label>
				<input type="text" class="form-control" name="Title" id="title" value="{{ $post->title }}" />
			</div>
			<div class="form-group">
				<label for="body" class="control-label">{{ __('Content') }}</label>
				<textarea class="form-control" rows="25" id="body" name="body">{{ $post->body }}</textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
				<button type="reset" class="btn btn-default">{{ __('Reset') }}</button>
			</div>
			</form>
                </div>
            </div>
        </div>
	<div class="col-md-4">
            @include('posts.archives')
	</div>
    </div>
</div>
@endsection
