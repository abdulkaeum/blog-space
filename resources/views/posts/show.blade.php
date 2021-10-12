<x-layout.layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <img src="{{ asset('images/illustration-1.png') }}" alt="" class="rounded-xl">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published
                    <time>{{ $post->created_at->diffForHumans() }}</time>
                </p>
                <p class="mt-4 block text-gray-400 text-xs">
                    Author: {{ $post->author->name }}
                </p>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <div class="space-x-2">
                        @foreach($post->tags->pluck('name') as $tag)
                            <a href="{{ route('posts.tag', $tag) }}"
                               class="px-3 py-1 border border-blue-900 rounded-full text-blue-900 text-xs uppercase font-semibold"
                               style="font-size: 10px">{{ $tag }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{ $post->title }}
                </h1>

                <div class="space-y-4 lg:text-lg leading-loose">
                    <p>
                        {{ $post->body }}
                    </p>
                </div>
            </div>
        </article>
    </main>
</x-layout.layout>
