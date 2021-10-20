@props(['post'])

<article
    {{ $attributes(['class' => 'm-2 transition-colors duration-300 hover:bg-gray-200 bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5 h-full flex flex-col">
        <div>
            <img src="{{ asset('storage/'.$post->image) }}" alt="Blog Post illustration"
                 class="rounded-xl">
        </div>

        <div class="mt-6 flex flex-col justify-between flex-1">
            <header>
                <div class="space-x-2">
                    @foreach($post->tags->pluck('name') as $tag)
                        <a href="{{ route('posts.tag', $tag) }}"
                           class="px-3 py-1 border border-blue-900 rounded-full text-blue-900 text-xs uppercase font-semibold"
                           style="font-size: 10px">
                            {{ $tag }}
                        </a>
                    @endforeach
                        <span
                            class="px-3 py-1 bg-green-200 rounded-full text-black-500 text-xs uppercase font-semibold"
                            style="font-size: 10px">{{ $post->views }} Views
                        </span>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="{{ route('post.show', $post->slug) }}">
                            {{ $post->title }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4">
                <p>
                    {{ $post->body }}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div>
                    <a href="{{ route('post.show', $post->slug) }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-blue-200 hover:bg-blue-300 rounded-full py-2 px-8"
                    >
                        Read More
                    </a>
                </div>
            </footer>
        </div>
    </div>
</article>
