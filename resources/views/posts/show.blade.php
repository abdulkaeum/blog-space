<x-layout.layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10 border-r border-t pr-5">
                <img src="{{ asset('images/illustration-1.png') }}" alt="" class="rounded-xl">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published
                    <time>{{ $post->created_at->diffForHumans() }}</time>
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img src="{{ asset('images/lary-avatar.svg') }}" alt="Lary avatar">
                    <div class="ml-3 text-left">
                        <h5 class="font-bold">
                            <a href="#">{{ $post->author->name }}</a>
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col-span-8 border-b pb-5">
                <div class="hidden lg:flex justify-between mb-6 border-b border-l pb-3 pl-3">
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
                    {{ $post->body }}
                </div>
            </div>

            <section class="col-span-8 col-start-5 mt-10 space-y-6 border-r pr-3">
                @include('posts._post-comment')
                @include('posts._comments')
            </section>

        </article>
    </main>
</x-layout.layout>
