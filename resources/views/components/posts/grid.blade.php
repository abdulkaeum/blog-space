@props(['posts'])

<x-posts.featured :featured="$posts->first()"/>

@if($posts->count() >= 2)
    <div class="lg:grid lg:grid-cols-6">
        @foreach($posts->skip(1) as $post)
            <x-posts.card
                :post="$post"
                class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"/>
        @endforeach
    </div>
@endif
