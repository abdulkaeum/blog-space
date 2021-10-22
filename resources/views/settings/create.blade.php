<x-settings.layout>
    <form action="{{ route('settings.post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <x-forms.input name="title" required/>

        <x-forms.input name="excerpt" required/>

        <x-forms.textarea name="body" placeholder="Body" required></x-forms.textarea>

        <x-forms.input type="file" name="thumbnail" required/>

        <x-layout.heading-h6>Tags</x-layout.heading-h6>
        <x-forms.input-checkbox name="tags" :options="$tags" />

        <x-forms.input-select name="status" :options="['live','draft']" required/>

        <x-forms.input-select name="author" :options="$users" required required/>

        <x-forms.submit>Publish</x-forms.submit>
    </form>
</x-settings.layout>
