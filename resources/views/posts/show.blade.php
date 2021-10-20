<x-layout.layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10 border-r border-t pr-5">
                <img src="{{ asset('storage/'.$post->image) }}" alt="" class="rounded">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published
                    <time>{{ $post->created_at->diffForHumans() }}</time>
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img src="https://i.pravatar.cc/60?u={{ $post->user_id }}" alt="" class="rounded" width="35"
                         height="35">
                    <div class="ml-3 text-left">
                        <h5 class="font-bold">
                            <a href="#">{{ $post->author->name }}</a>
                        </h5>
                    </div>
                </div>

                <div class="mt-10">
                    <span class="text-xs">Did you love this post?</span>
                    <ul class="flex justify-center mb-5">
                        @for($i = 1; $i <= 5; $i++)
                            <li>
                                <a href="{{ route('rate-post', ['post' => $post, 'star' => $i]) }}" title="{{ $i }}">
                                    <i class="fas fa-heart fa-lg text-red-400 hover:text-red-500 mr-2"></i>
                                </a>
                            </li>
                        @endfor
                    </ul>

                    <span class="text-xs lg:text-left text-left">What others thought</span>
                    @for($i = 1; $i <= 5; $i++)
                        <div class="lg:text-left text-left">
                            @for($x = 1; $x <= $i; $x++)
                                <i class="fas fa-heart fa-xs text-red-400 mr-2"></i>
                            @endfor
                            @php
                                $row = 'r_'.$i;
                            @endphp
                            <span class="text-xs">
                                {{ $post->$row }}
                            </span>
                        </div>
                    @endfor
                </div>

                <div class="mt-10 text-left">
                    <x-layout.heading-h6>Related</x-layout.heading-h6>
                    @foreach($relatedPosts as $relatedPost)
                        <div class="mt-3">
                            <div class="text-left text-sm">{{ $relatedPost->title }}</div>
                            <div>
                                <img width="140" height="140" class="rounded"
                                      src="{{ asset('storage/'.$relatedPost->image) }}" alt="{{ $relatedPost->title }}"
                                >
                            </div>
                        </div>
                    @endforeach
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
                @include('posts._comment-store')
                @include('posts._comments')
            </section>

        </article>
    </main>
</x-layout.layout>
