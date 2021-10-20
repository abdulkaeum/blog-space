<footer class="bg-gray-100 border border-black border-opacity-5 rounded text-center py-16 mt-16">
    <img src="{{ asset('images/footer-logo.png') }}" alt="" class="mx-auto mb-3 rounded" width="50">
    <h6 class="text-2xl">Keep up to date with the latest news</h6>

    <div class="mt-10">
        <x-forms.error name="email"/>
        <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

            <form method="POST" action="{{ route('newsletter') }}" class="lg:flex text-sm">
                @csrf

                <div class="lg:py-3 lg:px-5 flex items-center">
                    <label for="email" class="hidden lg:inline-block">
                        <img src="{{ asset('images/mailbox-icon.svg') }}" alt="mailbox letter">
                    </label>

                    <input id="email" name="email" type="text" placeholder="Your email address"
                           class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none"
                    >
                </div>

                <button type="submit"
                        class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                >
                    Subscribe
                </button>
            </form>
        </div>
        <p class="mt-6 text-xs">Blog Space Copyright &copy; {{ date('Y') }}</p>
    </div>
</footer>
