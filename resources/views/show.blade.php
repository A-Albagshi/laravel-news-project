<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/textStyles.css') }}">

    <style>
        body {
            font-family: karla;
        }

    </style>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
{{-- {{ddd($news->published_at->getTimestamp())}} --}}
{{-- {!!substr(substr($news->content, strpos($news->content, '<p'), strpos($news->content, '</p>') + 4),0,100)!!} --}}

<body>
    <section class="w-full flex flex-col ">
        <article class="flex flex-col shadow my-4 max-w-4xl mx-auto">
            <!-- Article Image -->
            <a href="#" class="hover:opacity-75">
                <img src="{{ asset('storage/' . $news->thumbnail) }}">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $news->category->name }}</a>
                <p class="text-3xl font-bold hover:text-gray-700">{{ Str::title($news->title) }}</p>
                <p class="text-sm">
                    By <a href="/news/?author={{ $news->author->name }}"
                        class="font-semibold hover:text-gray-800">{{ $news->author->name }}</a>,
                    Published on {{ date('d/M/Y', strtotime($news->published_at)) }}
                </p>
                {!! $news->content !!}
            </div>
        </article>
    </section>
    <div class="flex flex-col shadow my-4 max-w-4xl mx-auto">
        @foreach ($news->comments as $comment)
            {{-- @auth
                <div class="bg-white flex flex-col justify-start p-6">
                    <p> {{ $comment->commenter }}
                        {{ $comment->body }}</p>
                    <a href="{{ route('comments.edit', $comment->id) }}">
                        <button
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Edit Comment
                        </button>
                    </a>
                </div>
            @endauth --}}
            @if ($comment->is_approved)
                @if ($comment->is_visible)
                    <div class="bg-white flex flex-col justify-start p-6">
                        <p> {{ $comment->commenter }}
                            {{ $comment->body }}</p>
                            @auth
                            <a href="{{ route('comments.edit', $comment->id) }}">
                                <button
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Edit Comment
                            </button>
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Delete</button>
                            </form>
                            @endauth
                        </a>
                    </div>
                @else
                    <div class="bg-white flex flex-col justify-start p-6">
                        <h1>No Comments Yet</h1>
                    </div>
                @endif
            @endif
        @endforeach
    </div>
    <a href="{{ route('news') }}">
        <button
            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Back
        </button>
    </a>
    @auth
        <a href="/dashboard/news/{{ $news->slug }}/edit">
            <button
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Edit
            </button>
        </a>
        <form action="{{ route('news.destroy', $news->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Delete</button>
        </form>
    @endauth

    <div class="flex flex-col shadow my-4 max-w-4xl mx-auto">
        <x-comment-form :action="route('news.comments.store', $news->id)"></x-comment-form>
    </div>

</body>

</html>
