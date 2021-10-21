<x-settings.layout>
    <span
        class="bg-pink-200 text-pink-600 py-1 px-3 rounded-full text-xs">
        Last updated: {{ $post->updated_at->format('M-d-Y H:i:s') }}
    </span>

    <form action="{{ route('settings.post.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <x-forms.input name="title" :value="old('title', $post->title)" required/>

        <x-forms.input name="excerpt" :value="old('excerpt', $post->excerpt)" required/>

        <x-forms.textarea name="body" placeholder="Body" required>{{ $post->body }}</x-forms.textarea>

        <div class="flex justify-between">
            <x-forms.input type="file" name="thumbnail"/>
            <div>
                <img src="{{ asset('storage/'.$post->image) }}" alt="" class="object-scale-down" width="200">
            </div>
        </div>

        <x-layout.heading-h6>Tags</x-layout.heading-h6>
        <x-forms.input-checkbox name="tags" :options="$tags" :dbData="$postTags"/>

        <x-forms.input-select name="status" :options="['live','draft']" :dbData="$post->status"/>

        <x-forms.submit>Update</x-forms.submit>
    </form>
</x-settings.layout>
