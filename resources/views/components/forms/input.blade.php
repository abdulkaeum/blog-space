@props(['name', 'type' => 'text'])

<div class="mt-2">
    <label for="{{ $name }}">
        <input
            class="rounded px-4 w-full py-2 bg-gray-200  border border-gray-400 mb-3 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none"
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            placeholder="{{ ucwords($name) }}"
            value="{{ old($name) }}"
            {{ $attributes }}
        >
    </label>
    <x-forms.error name="{{ $name }}"/>
</div>
