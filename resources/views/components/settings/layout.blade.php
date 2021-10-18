<x-layout.layout>
    <x-layout.heading-h2>Settings</x-layout.heading-h2>

    <div class="container w-full flex flex-wrap mx-auto px-2">
        @include('settings.nav')

        <div class="w-full lg:w-4/5 p-8 mt-6 lg:mt-0 text-gray-900 leading-normal bg-white border border-gray-400 border-rounded">
            {{ $slot }}
        </div>
    </div>
</x-layout.layout>
