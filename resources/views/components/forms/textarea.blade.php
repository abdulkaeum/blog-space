@props(['name'])

<div class="mt-4 mb-4">
    <label for="{{ $name }}">
    </label>

    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        class="w-full border rounded-lg h-17 p-3 focus:outline-none focus:ring bg-gray-50"
        rows="5"
            {{ $attributes }}
        >{{ old($name) ?? $slot }}</textarea>

    <x-forms.error name="{{ $name }}"/>
</div>
