@props(['comments', 'news'])
@php
$counter = 0;
@endphp

<div class="flex flex-col shadow my-4 max-w-4xl mx-auto shadow sm:rounded-md sm:overflow-hidden">
    @foreach ($comments as $comment)
        @auth
            <div class="flex flex-row justify-between p-6 border-b-2 {{ $comment->is_approved ? 'bg-white': (($comment->is_visible) ? 'bg-red-100 text-red-800' : 'bg-red-100 text-red-800')  }}">
                <div class="max-w-2xl">
                    <p class="text-2xl">By: <b>{{ $comment->commenter }} </b>,
                        <span>{{ $comment->created_at->diffForHumans() }}</span>
                    </p>
                    <p>{{ $comment->body }}</p>
                </div>
                <div class="border-l-2 pl-2 flex flex-col justify-between items-center">
                    <x-comment-button :action="route('comments.edit', $comment->id)"
                        class="bg-indigo-700 hover:bg-indigo-800">
                        {{ __('Edit Comment') }}
                    </x-comment-button>
                    <x-comment-button :action="route('comments.edit', $comment->id)"
                        class="bg-indigo-700 hover:bg-indigo-800">
                        {{ __('Approve Comment') }}
                    </x-comment-button>
                    <x-comment-button :action="route('comments.edit', $comment->id)"
                        class="bg-indigo-700 hover:bg-indigo-800">
                        {{ __('Hide Comment') }}
                    </x-comment-button>
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full h-12 px-6 my-1 border border-transparent shadow-sm rounded-md text-white bg-red-600 hover:bg-red-700">Delete
                            Comment</button>
                    </form>
                </div>
            </div>
        @else
            @if ($comment->is_approved)
                @if ($comment->is_visible)
                    @php
                        $counter++;
                    @endphp
                    <div class="bg-white flex flex-col justify-start p-6 border-b-2">
                        <p class="text-2xl">By: <b>{{ $comment->commenter }} </b>,
                            <span>{{ $comment->created_at->diffForHumans() }}</span>
                        </p>
                        <p>{{ $comment->body }}</p>
                        </a>
                    </div>
                @endif
            @endif
        @endauth
    @endforeach
    @auth

    @else
        @if ($counter == 0)
            <div class="bg-white flex flex-col justify-start p-6">
                <h1>No Comments Yet</h1>
            </div>
        @endif
    @endauth


    <x-comment-form :action="route('news.comments.store', $news->id)"></x-comment-form>
</div>
<div class="flex flex-col shadow my-4 max-w-4xl mx-auto">
</div>
