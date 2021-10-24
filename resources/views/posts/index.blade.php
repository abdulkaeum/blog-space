<x-layout.layout>
    <main>
        @if($posts->count() > 0)

            <x-layout.heading-h2>
                @if(Request::route()->getName() == 'bookmark.index')
                    My bookmarks
                @else
                    Latest Post
                    @if(Request::route()->getName() == 'posts.tag')
                        : {{ ucwords(Route::current()->parameter('tag')->name) }}
                    @endif
                @endif



                {{ isset($searchString) ? ': '.$searchString : '' }}
            </x-layout.heading-h2>

            <x-posts.grid :posts="$posts"/>
            <div class="mt-5">
                {{ $posts->links() }}
            </div>
        @else
            <x-messages.info title="Posts" message="No posts found."/>
        @endif
    </main>
</x-layout.layout>
