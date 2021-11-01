<div class="w-full lg:w-1/5 lg:px-6 text-xl text-gray-800 leading-normal">
    <div class="block lg:hidden">
        <button id="menu-toggle" class="flex w-full justify-end px-3 py-3 bg-white lg:bg-transparent border rounded border-gray-600 hover:border-purple-500 appearance-none focus:outline-none">
            <svg class="fill-current h-3 float-right" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
            </svg>
        </button>
    </div>
    <div class="w-full hidden h-64 lg:h-auto overflow-x-hidden overflow-y-auto lg:overflow-y-hidden lg:block mt-0 border border-gray-400 lg:border-transparent bg-white shadow lg:shadow-none lg:bg-transparent z-20" style="top:5em;" id="menu-content">
        <ul class="list-reset">
            <li class="py-2 md:my-0 hover:bg-purple-100 lg:hover:bg-transparent">
                <a href="{{route('settings.index')  }}" class="block pl-4 align-middle text-gray-700 no-underline hover:text-blue-500 border-l-4 border-transparent {{ Request::routeIs('settings.index') ? 'lg:border-blue-500 lg:hover:border-blue-500' : 'lg:hover:border-gray-400' }}">
                    <span class="pb-1 md:pb-0 text-sm {{ Request::routeIs('settings.index') ? 'text-gray-900 font-bold' : '' }}">Blogs</span>
                </a>
            </li>
            <li class="py-2 md:my-0 hover:bg-purple-100 lg:hover:bg-transparent">
                <a href="{{ route('settings.post.create') }}" class="block pl-4 align-middle text-gray-700 no-underline hover:text-blue-500 border-l-4 border-transparent {{ Request::routeIs('settings.post.create') ? 'lg:border-purple-500 lg:hover:border-purple-500' : 'lg:hover:border-gray-400' }}">
                    <span class="pb-1 md:pb-0 text-sm {{ Request::routeIs('settings.post.create') ? 'text-gray-900 font-bold' : '' }}">New Blog</span>
                </a>
            </li>
            <li class="py-2 md:my-0 hover:bg-purple-100 lg:hover:bg-transparent">
                <a href="{{ route('profile.edit', auth()->user()->profile->id) }}" class="block pl-4 align-middle text-gray-700 no-underline hover:text-blue-500 border-l-4 border-transparent {{ Request::routeIs('profile.edit') ? 'lg:border-purple-500 lg:hover:border-purple-500' : 'lg:hover:border-gray-400' }}">
                    <span class="pb-1 md:pb-0 text-sm {{ Request::routeIs('profile.edit') ? 'text-gray-900 font-bold' : '' }}">Edit Profile</span>
                </a>
            </li>
        </ul>
    </div>
</div>
