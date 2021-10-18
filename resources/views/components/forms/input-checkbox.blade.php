@props(['name', 'options', 'dbData' => []])

@foreach($options as $option)
    <div class="mt-4 mb-4">
        <input
            type="checkbox"
            name="{{ $name }}[]"
            id="{{ $name.'-'.$option->id }}"
            value="{{ $option->id }}"
            class="form-checkbox"
        @if(! is_array(old($name)) && in_array($option->id, $dbData))
            checked
        @elseif(is_array(old($name)) && in_array($option->id, old($name)))
            checked
        @endif
        >
        <label for="{{ $name.'-'.$option->id }}" class="inline-flex items-center">
            <span
                class="ml-2">{{ ucwords($option->name) }}</span>
        </label>
    </div>
@endforeach

<x-forms.error name="{{ $name }}"/>


