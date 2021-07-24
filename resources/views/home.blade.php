<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
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
    {{ $news->count() }}
    <a href="{{route('news.create')}}">Create news</a>
    @foreach ($news as $news)
        <div class="">
            <a href="{{route('news.show',$news->slug)}}">
                <img src="{{ asset('storage/' . $news->thumbnail) }}" width=1000>
                <br>
                {{ $news->title }}
            </a>
            <p>{{$news->author->name}}</p>
            <p>{{$news->category->name}}</p>
            {!! $news->content !!}
        </div>
    @endforeach
</body>

</html>
