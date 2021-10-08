@props(['name'])

@error($name)
    <div {{ $attributes(['class' => 'text-red-700 text-sm mb-3']) }}>
        <p>
            {{ $message }}
        </p>
    </div>
@enderror
