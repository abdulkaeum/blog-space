@props(['name', 'options', 'dbData' => ''])

<div class="mt-4 mb-4">
    <label for="{{ $name }}">
    </label>
    <select name="{{ $name }}" id="{{ $name }}" class="h-10 pl-3 border rounded focus:shadow-outline w-1/4"
        {{ $attributes }}>
        <option value="">Select {{ $name }}</option>
        @foreach($options as $option)
            @if(gettype($options) === 'array')
                <option value="{{ $option }}"
                    @if(! is_null(old($name)) && $option == old($name))
                        selected
                    @elseif(is_null(old($name)) && $option == $dbData)
                        selected
                    @endif
                >{{ ucwords($option) }}</option>
            @elseif(gettype($options) === 'object')
                <option value="{{ $option->id }}"
                    @if(! is_null(old($name)) && $option->id == old($name))
                        selected
                    @elseif(is_null(old($name)) && $option->id == $dbData)
                        selected
                    @endif
                >{{ ucwords($option->name ) }}</option>
            @endif
        @endforeach
    </select>
</div>

<x-forms.error name="{{ $name }}"/>


