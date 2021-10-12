@props(['href' => '#', 'color' => 'indigo'])

<a
    class="inline-flex items-center h-8 px-4 m-2 text-sm text-{{$color}}-100 transition-colors duration-150 bg-{{$color}}-500 rounded-lg focus:shadow-outline hover:bg-{{$color}}-600"
    href="#">
    {{ $slot }}
</a>
