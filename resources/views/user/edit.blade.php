<x-settings.layout>
    <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <x-forms.input name="username" :value="old('username', $profile->username)" required />

        <x-forms.input name="url" :value="old('url', $profile->url)" />

        <x-forms.textarea name="description" placeholder="Profile description" >{{ $profile->description }}</x-forms.textarea>

        <div class="flex justify-between">
            <x-forms.input type="file" name="image"/>
            <div>
                <img src="{{ !is_null($profile->image) ? asset('storage/'.$profile->image) : asset('images/avatar.jfif') }}" alt="" class="object-scale-down" width="200">
            </div>
        </div>

        <x-forms.submit>Save</x-forms.submit>
    </form>
</x-settings.layout>
