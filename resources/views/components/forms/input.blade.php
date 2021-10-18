@props(['name', 'type' => 'text'])

<div class="mt-4 mb-4">
    <label for="{{ $name }}" class="{{ in_array($type, ['file']) ? 'block' : 'hidden' }}">
        <x-layout.heading-h6>{{ ucwords($name) }}</x-layout.heading-h6>
    </label>

    <input
        class="rounded px-4 w-full py-2 bg-gray-50  border border-gray-200 text-gray-700 focus:bg-white focus:outline-none"
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        placeholder="{{ ucwords($name) }}"
        {{ $attributes(['value' => old($name)]) }}
    >

    <x-forms.error name="{{ $name }}"/>
</div>
