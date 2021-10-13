<x-layout.layout>

    <div class="bg-cover w-full h-screen"
         style="background-image: url('./images/login.webp');">
        <div class="content px-8 py-2">
            <nav class="flex items-center justify-between">
                <h1 class="text-gray-200 font-bold text-2xl ">Brand</h1>
                <div class="auth flex items-center">
                    <a href="{{ route('home') }}"
                       class="bg-transparent text-gray-200  p-2 rounded border border-gray-300 mr-4 hover:bg-gray-100 hover:text-gray-700">
                        Home
                    </a>
                    <a href="{{ route('register.create') }}"
                       class="bg-transparent text-gray-200  p-2 rounded border border-gray-300 mr-4 hover:bg-gray-100 hover:text-gray-700">
                        Sign up for free
                    </a>
                </div>
            </nav>
            <div class="body mt-20 mx-8">
                <div class="md:flex items-center justify-between">
                    <div class="w-full md:w-1/2 mr-auto" style="text-shadow: 0 20px 50px hsla(0,0%,0%,8);">
                        <h2 class=" text-2xl font-bold text-white tracking-wide">
                            The stars don't look bigger, but they do look brighter.
                        </h2>
                        <p class="text-gray-300">
                            Sally Ride
                        </p>
                    </div>
                    <div class="w-full md:max-w-md mt-6">
                        <div class="card bg-white shadow-md rounded-lg px-4 py-4 mb-6 ">
                            <form action="{{ route('login.store') }}" method="POST">
                                @csrf
                                <div class="flex items-center justify-center">
                                    <h2 class="text-2xl font-bold tracking-wide">
                                        Welcome back
                                    </h2>
                                </div>
                                <h2 class="text-xl text-center font-semibold text-gray-800 mb-2">
                                    Sign In
                                </h2>

                                <x-forms.input name="email" type="email" required/>
                                <x-forms.input name="password" type="password" required/>
                                <x-forms.submit>Sign In</x-forms.submit>
                                <x-forms.error name="authFailed" class="mt-2"/>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout.layout>