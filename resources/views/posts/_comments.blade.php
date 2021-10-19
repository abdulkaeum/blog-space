@foreach($post->comments->sortByDesc('created_at') as $comment)
    <div class="border border-gray-300 p-2 rounded-xl bg-gray-{{ $loop->even ? '100' : '50' }}">
        <article class="flex space-x-3">
            <div class="flex-shrink-0">
                <img
                    src="https://i.pravatar.cc/60?u={{ $comment->user_id }}"
                    alt=""
                    width="35"
                    height="35"
                    class="rounded-xl">
                <div class="mt-2">
                    @include('posts._best_comment')
                </div>
            </div>

            <div>
                <header class="mb-4">
                    <h3 class="font-semibold">{{ $comment->author->name }}</h3>

                    <p class="text-xs">
                        <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time>
                    </p>
                </header>

                <p>
                    {{ $comment->body }}
                </p>
            </div>
        </article>
    </div>
@endforeach
