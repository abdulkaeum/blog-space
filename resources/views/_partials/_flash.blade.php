@if (session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="fixed bg-green-500 text-white py-3 px-3 rounded-xl top-3 left-1/2 text-sm">
        <p>{{ session()->get('success') }}</p>
    </div>
@endif

@if (session()->has('error'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="fixed bg-red-500 text-white py-3 px-3 rounded-xl top-3 left-1/2 text-sm">
        <p>{{ session()->get('error') }}</p>
    </div>
@endif

@if (session()->has('warning'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="fixed bg-yellow-500 text-white py-3 px-3 rounded-xl top-3 left-1/2 text-sm">
        <p>{{ session()->get('warning') }}</p>
    </div>
@endif

@if (session()->has('info'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="fixed bg-blue-500 text-white py-3 px-3 rounded-xl top-3 left-1/2 text-sm">
        <p>{{ session()->get('info') }}</p>
    </div>
@endif
