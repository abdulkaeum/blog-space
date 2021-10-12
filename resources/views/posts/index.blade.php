<x-layout.layout>
    <main>
        @if($posts->count() > 0)

            <x-layout.heading-h2>
                Latest Post
                @if(Request::route()->getName() == 'posts.tag')
                    : {{ ucwords(Route::current()->parameter('tag')->name) }}
                @endif
            </x-layout.heading-h2>

            <x-posts.grid :posts="$posts"/>
            {{ $posts->links() }}
        @else
            <x-messages.info title="Posts" message="No posts found."/>
        @endif
    </main>
</x-layout.layout>
