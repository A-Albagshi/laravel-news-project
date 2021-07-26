@props(['news'])

<article {{ $attributes->merge(['class' => 'flex flex-col shadow my-4']) }}>
    <!-- news Thumbnail -->
    <a href="{{ route('news.show', $news->slug) }}" class="hover:opacity-75 ">
        <img class="w-full" src="{{ asset('storage/' . $news->thumbnail) }}">
    </a>
    <div class="bg-white flex flex-col justify-between p-6 flex-grow">
        <a href="#" class="text-blue-700 text-lg hover:text-black font-bold uppercase pb-4">{{ $news->category->name }}</a>
        <a href="{{ route('news.show', $news->slug) }}" class="text-3xl font-bold hover:text-indigo-700 pb-4">
            {{ Str::title($news->title) }}</a>
        <p href="#" class="text-lg pb-3">
            By <a href="/news/?author={{ $news->author->name }}"
                class="font-semibold hover:text-indigo-700">{{ $news->author->name }}</a>, Published on
            {{ date('d/M/Y', strtotime($news->published_at)) }}
            {{ $news->created_at->diffForHumans() }}
        </p>
        <div class="pb-6"> {!! Str::words(substr($news->content, strpos($news->content, '<p'), strpos($news->content, '</p>') + 4), 40, '...') !!} </div>
        <a href="{{ route('news.show', $news->slug) }}"
            class="uppercase hover:text-indigo-700 mt-3 items-self-end content-self-end">Continue Reading <i
                class="fas fa-arrow-right"></i> </a>
    </div>
</article>
