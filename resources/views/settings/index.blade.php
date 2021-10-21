<x-settings.layout>
    <div class="w-full">
        <div class="bg-white shadow-md rounded my-6">
            <table class="min-w-max w-full table-auto">
                <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6">Title</th>
                    <th class="py-3 px-6">Author</th>
                    <th class="py-3 px-6">Status</th>
                    <th class="py-3 px-6">Action</th>
                </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                @forelse($posts as $post)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6">
                            <a href="{{ route('settings.post.edit', $post) }}">
                                <i class="fas fa-pencil-alt"></i>
                                &nbsp;
                                {!! \Illuminate\Support\Str::substr($post->title, 0, 25) !!}...
                            </a>
                        </td>
                        <td class="py-3 px-6 text-center">
                            {{ $post->author->name }}
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span
                                class="{{ $post->status == 'live' ? 'bg-green-200 text-green-600' : 'bg-red-200 text-red-600' }} py-1 px-3 rounded-full text-xs">
                                {{ ucwords($post->status) }}
                            </span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <form action="{{ route('settings.post.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-forms.submit>
                                    <i class="fas fa-trash-alt"></i>
                                </x-forms.submit>
                            </form>
                        </td>
                    </tr>
                @empty
                    <x-messages.info title="Info" message="No blogs added yet"/>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    {{ $posts->links() }}
</x-settings.layout>
