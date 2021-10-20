@if($comment->post->best_comment_id === $comment->id)
    <div class="text-orange-500 mt-5 ml-2" title="Best comment">
        <i class="fas fa-star text-blue-500"></i>
    </div>
@else
    @can('bestComment', $post)
        <form action="{{ route('best-comment', $comment) }}" method="POST">
            @csrf
            <x-forms.submit
                title="Mark as best comment"
                class="py-0 px-0 bg-blue-400 hover:bg-blue-600 muted">
                <i class="fas fa-star"></i>
            </x-forms.submit>
        </form>
    @endcan
@endif
