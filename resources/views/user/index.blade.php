<x-layout.layout>

    <div class='flex justify-center items-center'>
        <div
            class="card min-w-sm border border-gray-100 bg-purple-100   transition-shadow shadow-xl hover:shadow-xl min-w-max">
            <!---->
            <div class=" card__media">
                <img
                    src="{{ asset('images/login.webp') }}"
                    class="h-48 w-full">
            </div>
            <div class="  card__media--aside "></div>
            <div class="flex items-center p-4">
                <div class="relative flex flex-col items-center w-full">
                    <div
                        class="h-24 w-24 md rounded-full relative avatar flex items-end justify-end text-purple-600 min-w-max absolute -top-16 flex bg-purple-200 text-purple-100 row-start-1 row-end-3 text-purple-650 ring-1 ring-white">
                        <img class="h-24 w-24 md rounded-full relative"
                             src="https://i.pravatar.cc/60?u={{ auth()->user()->id }}" alt="">
                        <div class="absolute"></div>
                    </div>
                    <div class="flex flex-col space-y-1 justify-center items-center -mt-12 w-full">
                        <span class="text-md whitespace-nowrap text-gray-800 font-semibold">
                            {{ auth()->user()->name }}
                        </span>
                        <div class="py-2 flex space-x-2">
                            Level:
                            <span class="text-green-500 ml-2">
                                {{ ucwords(auth()->user()->role->name) }}
                            </span>
                        </div>
                        <div
                            class="py-4 flex justify-center items-center w-full divide-x divide-gray-400 divide-solid">
                                <span class="text-center px-2"><span class="font-bold text-gray-700">56</span><span
                                        class="text-gray-600"> followers</span></span><span
                                class="text-center px-2"><span class="font-bold text-gray-700">112</span><span
                                    class="text-gray-600"> following</span></span><span
                                class="text-center px-2"><span class="font-bold text-gray-700">
                                    {{ auth()->user()->posts()->count() }}
                                </span><span
                                    class="text-gray-600"> posts</span></span>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
        </div>
    </div>

</x-layout.layout>
