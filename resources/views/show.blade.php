<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        body {
            font-family: karla;
        }

        img {
            max-width: 100%;
            height: auto;
        }

    </style>
</head>

<body>
    <img src="{{ asset('storage/' . $news->thumbnail) }}" width=500>

    <p>{{ $news->title }}</p>

    {!! $news->content !!}

    <a href="{{ route('news') }}">
        <button
            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Back
        </button>
    </a>
    <a href="/dashboard/news/{{ $news->slug }}/edit">
        <button
            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Edit
        </button>
    </a>
    <form action="{{ route('news.destroy', $news->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>

</body>

</html>
