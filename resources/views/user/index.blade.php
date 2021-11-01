<x-layout.layout>

    <div class='flex justify-center items-center'>
        <div
            class="card min-w-sm border border-gray-100 bg-purple-100   transition-shadow shadow-xl hover:shadow-xl w-2/4">
            <!---->
            <div class=" card__media">
                <img
                    src="{{ asset('images/login.webp') }}"
                    class="h-48 w-full">
            </div>
            <div class="  card__media--aside "></div>
            <div class="flex justify-center items-center p-4 w-auto">
                <div class="relative flex flex-col justify-center items-center">
                    <div
                        class="h-24 w-24 md rounded-full relative avatar flex items-end justify-end text-purple-600 min-w-max absolute -top-16 flex bg-purple-200 text-purple-100 row-start-1 row-end-3 text-purple-650 ring-1 ring-white">
                        <img class="h-25 w-24 md rounded-full relative"
                             src="{{ !is_null($profile->image) ? asset('storage/'.$profile->image) : asset('images/avatar.jfif') }}"
                             alt="">
                        <div class="absolute"></div>
                    </div>
                    <div class="flex flex-col space-y-1 justify-center items-center -mt-12">
                        <div class="py-2 space-x-2">
                            <span class="text-md whitespace-nowrap text-gray-800 font-semibold">
                                {{ $user->name }}

                            </span>
                        </div>

                        <div class="py-2 space-x-2">
                            Username:
                            <span class="ml-2">
                                {{ $profile->username }}
                            </span>
                        </div>

                        <div class="py-2 flex space-x-2">
                            Level:
                            <span class="text-green-500 ml-2">
                                {{ ucwords($user->role->name) }}
                            </span>
                        </div>

                        <div class="py-2 flex space-x-2">
                            <div
                                class="py-4 flex justify-center items-center w-full divide-x divide-gray-400 divide-solid">
                                <span class="text-center px-2">
                                    <span class="font-bold text-gray-700">
                                        {{ $user->profile->followers->count() }}
                                    </span>
                                    <span
                                        class="text-gray-600"> {{  \Illuminate\Support\Str::plural('Followers', $user->profile->followers->count()) }}</span>
                                </span>
                                <span class="text-center px-2">
                                    <span class="font-bold text-gray-700">
                                        {{ $user->following->count() }}
                                    </span>
                                    <span class="text-gray-600"> Following</span>
                                </span>
                                <span class="text-center px-2">
                                    <span class="font-bold text-gray-700">
                                        {{ $user->posts->count() }}
                                    </span>
                                    <span class="text-gray-600"> posts</span>
                                </span>
                            </div>
                        </div>
                        @auth
                            @if($user->id !== auth()->user()->id)
                                <div class="py-2 flex space-x-2">
                                    <form action="{{ route('follow.store', $user) }}" method="POST">
                                        @csrf
                                        <x-forms.submit>
                                            {{ $following ? 'Unfollow' : 'Follow' }}
                                        </x-forms.submit>
                                    </form>
                                </div>
                            @endif
                            <div class="py-2 flex space-x-2">
                                <x-layout.link href="{{ route('profile.edit', $user->profile) }}">
                                    Edit Profile
                                </x-layout.link>
                            </div>
                        @else
                            <div class="py-2 flex space-x-2">
                                <x-layout.link href="/login">Login to follow</x-layout.link>
                            </div>
                        @endauth
                        <div class="py-2 flex space-x-2">
                            <h2>About me: </h2>
                            <span class="ml-2">
                                {{ $profile->description }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
        </div>
    </div>

</x-layout.layout>
