<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
        <h1>tests</h1>
        {{$news->count()}}

        @foreach ($news as $news)
        
        <img src="{{ asset('storage/' . $news->thumbnail) }}" width=500>
        <a href="/news/{{$news->slug}}">
            {{-- {{ddd($news)}} --}}
            <h1>{{$news->title}}</h1>
        </a>
        {!!$news->content!!}
        @endforeach
</body>
</html>