@guest
    <a href="{{ route('login') }}">{{ __('Login to edit this post') }}</a>
@else
	<a href="{{ route('posts.edit', $post) }}">{{ __('Edit') }}</a>
	<a href="{{ route('posts.destroy', $post) }}"
	       onclick="event.preventDefault();
		             document.getElementById('remove-post').submit();">
		{{ __('Delete') }}
	    </a>

	    <form id="remove-post" action="{{ route('posts.destroy', $post) }}" method="POST" style="display: none;">
		@method('DELETE')
		@csrf
	    </form>
@endguest
