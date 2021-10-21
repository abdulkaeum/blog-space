@props(['name','options', 'dbData' => []])

<div class="mt-4 mb-4">
    <label for="{{ $name }}">
        <x-layout.heading-h6>{{ ucwords($name) }}</x-layout.heading-h6>
    </label>
    <select name="{{ $name }}" id="{{ $name }}" class="h-10 pl-3 border rounded focus:shadow-outline w-1/4">
        @foreach($options as $option)
            <option value="{{ $option }}"
                {{ $option == $dbData ? 'selected' : '' }}
            >{{ ucwords($option) }}</option>
        @endforeach
    </select>
</div>

<x-forms.error name="{{ $name }}"/>


