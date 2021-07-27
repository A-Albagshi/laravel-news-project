@props(['news'])

<article
    {{ $attributes->merge(['class' => 'flex flex-col rounded-2xl overflow-hidden shadow my-4 transition duration-500 ease-in-out transform hover:shadow-2xl']) }}>
    <!-- news Thumbnail -->
    <a href="{{ route('news.show', $news->slug) }}" class="hover:opacity-75 ">
        <img class="w-full h-96	object-cover object-top" src="{{ asset('storage/' . $news->thumbnail) }}">
    </a>
    <div class="bg-white flex flex-col justify-between p-6 flex-grow">
        <div class="">
            <a href="{{ route('news.show', $news->slug) }}" class="text-3xl font-bold text-blue-900 hover:text-black pb-4">
                {{ Str::title($news->title) }}</a>
            <p class="text-xl  pb-3">
                By <a href="/allnews?author={{ $news->author->name }}"
                    class="font-semibold text-blue-900 hover:text-black">{{ $news->author->name }}</a>, Published
                {{ $news->created_at->diffForHumans() }}
            </p>
            <a href="/allnews?category={{ $news->category->slug }}"
                class="text-blue-900 text-2xl hover:text-black font-bold uppercase pb-8 mb-2">
                {{ $news->category->name }}</a>
            <div class="mt-4 "> {!! Str::words(substr($news->content, strpos($news->content, '<p>'), strpos($news->content, '</p>') + 4), 40, '...') !!} </div>
        </div>
        <a href="{{ route('news.show', $news->slug) }}"
            class="uppercase text-white text-2xl p-10 bg-blue-900 hover:text-gray-200 mt-3 rounded-2xl  items-self-end content-self-end">Read
            More <i class="fas fa-arrow-right"></i> </a>
    </div>
</article>
