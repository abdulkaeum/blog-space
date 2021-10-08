<x-layout.layout>

    <div class="bg-cover h-screen"
         style="background-image: url('./images/register.jpg');">
        <div class="content px-8 py-2">
            <nav class="flex items-center justify-between">
                <h1 class="text-gray-200 font-bold text-2xl ">Brand</h1>
                <div class="auth flex items-center">
                    <a href="{{ route('home') }}"
                       class="bg-transparent text-gray-200  p-2 rounded border border-gray-300 mr-4 hover:bg-gray-100 hover:text-gray-700">
                        Home
                    </a>

                    <a href="{{ route('login.create') }}"
                       class="bg-transparent text-gray-200  p-2 rounded border border-gray-300 mr-4 hover:bg-gray-100 hover:text-gray-700">
                        Sign in
                    </a>
                </div>
            </nav>
            <div class="body mt-20 mx-8">
                <div class="md:flex items-center justify-between">
                    <div class="w-full md:w-1/2 mr-auto" style="text-shadow: 0 20px 50px hsla(0,0%,0%,8);">
                        <h2 class=" text-2xl font-bold text-white tracking-wide">
                            The Universe is under no obligation to make sense to you.
                        </h2>
                        <p class="text-gray-300">
                            Neil deGrasse Tyson
                        </p>
                    </div>
                    <div class="w-full md:max-w-md mt-6">
                        <div class="card bg-white shadow-md rounded-lg px-4 py-4 mb-6 ">
                            <form action="{{ route('register.store') }}" method="POST">
                                @csrf
                                <div class="flex items-center justify-center">
                                    <h2 class="text-2xl font-bold tracking-wide">
                                        Sign up
                                    </h2>
                                </div>
                                <h2 class="text-xl text-center font-semibold text-gray-800 mb-2">
                                    It's free!
                                </h2>

                                <x-forms.input name="name" required/>

                                <x-forms.input name="email" type="email" required/>

                                <x-forms.input name="password" type="password" required/>

                                <x-forms.submit>
                                    Sign Up
                                </x-forms.submit>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout.layout>
