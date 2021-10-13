@auth
    <form action="{{ route('post.comment', $post->id) }}" method="POST">
        @csrf
        <div class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}"
                 alt=""
                 width="50"
                 height="50"
                 class="rounded-full">

            <h2 class="ml-4">Want to participate?</h2>
        </div>

        <div class="mt-5">
            <textarea
                name="body"
                class="w-full border rounded-lg h-17 p-3 focus:outline-none focus:ring"
                rows="5"
                placeholder="Add a comment"
                required
            >{{ old('comment') }}</textarea>

            <x-forms.error name="comment"/>
        </div>

        <x-forms.submit>Submit Comment</x-forms.submit>
    </form>
@else
    <h2 class="ml-4">
        Want to participate?
        <a href="{{ route('login.create') }}">Login here</a>
    </h2>
@endauth
