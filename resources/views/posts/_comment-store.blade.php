@auth
    <form action="{{ route('comment.store', $post->id) }}" method="POST">
        @csrf
        <div class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}"
                 alt=""
                 width="50"
                 height="50"
                 class="rounded-full">

            <h2 class="ml-4">Want to participate?</h2>
        </div>

        <x-forms.textarea
            name="body"
            placeholder="Add a comment"
            required
        ></x-forms.textarea>

        <x-forms.submit>Submit Comment</x-forms.submit>
    </form>
@else
    <h2 class="ml-4">
        Want to participate?
        <a href="{{ route('login.create') }}">Login here</a>
    </h2>
@endauth
