@props(['comments', 'news'])
@php
$counter = 0;
@endphp

<div class="flex flex-col shadow my-4 shadow w-full rounded-2xl overflow-hidden max-w-4xl">
@foreach ($comments as $comment)
        @auth
            <div class="flex flex-row justify-between p-6 border-b-2 {{ ($comment->is_approved && $comment->is_visible == 1) ? 'bg-white': (($comment->is_visible) ? 'bg-gray-700 ' : 'bg-gray-700')  }}">
                <div class="max-w-2xl">
                    <p class="text-2xl">By: <b>{{ $comment->commenter }} </b>,
                        <span>{{ $comment->created_at->diffForHumans() }}</span>
                    </p>
                    <p>{{ $comment->body }}</p>
                </div>
                <div class="border-l-2 pl-2 flex flex-col justify-between items-center">
                    <x-comment-button :action="route('comments.edit', $comment->id)"
                        class="text-white bg-blue-800 hover:bg-blue-900">
                        {{ __('Edit Comment') }}
                    </x-comment-button>
                    <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="w-full h-12 px-6 my-1 border border-transparent shadow-sm rounded-md {{ ($comment->is_approved && $comment->is_visible == 1) ? 'bg-gray-700 text-white': (($comment->is_visible) ? 'bg-white ' : 'bg-white')  }}">
                            {{ ($comment->is_approved && $comment->is_visible == 1) ? 'Hide Comment': (($comment->is_visible) ? 'Show Comment ' : 'Show Comment')  }}
                        </button>
                        <input class="hidden" name="approved" type='checkbox' {{ ($comment->is_approved && $comment->is_visible == 1) ? '': (($comment->is_visible) ? 'checked' : 'checked')  }}/>
                    </form> 
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full h-12 px-6 my-1 border border-transparent shadow-sm rounded-md text-white bg-red-800 hover:bg-red-900">Delete
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

