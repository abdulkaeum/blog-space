@props(['featured'])

<article
    class="transition-colors duration-300 hover:bg-gray-200 bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="{{ asset('storage/'.$featured->image) }}" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    @foreach($featured->tags->pluck('name') as $tag)
                        <a href="{{ route('posts.tag', $tag) }}"
                           class="px-3 py-1 border border-blue-900 rounded-full text-blue-900 text-xs uppercase font-semibold"
                           style="font-size: 10px">{{ $tag }}
                        </a>
                    @endforeach
                        <span
                           class="px-3 py-1 bg-green-200 rounded-full text-black-500 text-xs uppercase font-semibold"
                           style="font-size: 10px">{{ $featured->views }} Views
                        </span>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="{{ route('post.show', $featured->slug) }}">
                            {{ $featured->title }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $featured->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-2">
                <p>
                    {{ $featured->body }}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">

                <div class="hidden lg:block">
                    <a href="{{ route('post.show', $featured->slug) }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-blue-300 hover:bg-blue-400 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
