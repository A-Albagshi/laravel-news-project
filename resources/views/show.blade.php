<x-news>
    <div class="container mx-auto flex flex-wrap py-6">
        <section class="w-full md:w-2/3 flex flex-col">
            <article class="flex flex-col shadow my-4   max-w-4xl mx-auto">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75 justify-center">
                    <img class="w-full" src="{{ asset('storage/' . $news->thumbnail) }}">
                </a>
                <div class="bg-white text-gray	 flex flex-col justify-start p-6">
                    <p class="text-3xl font-bold hover:text-indigo-700">{{ Str::title($news->title) }}</p>
                    <p class="text-sm">
                        By <a href="/news/?author={{ $news->author->name }}"
                            class="font-semibold hover:text-indigo-700">{{ $news->author->name }}</a>,
                        Published on {{ date('d/M/Y', strtotime($news->published_at)) }}
                    </p>
                    <a href="#" class="text-indigo-700 text-sm font-bold uppercase pb-4">
                        <h1>{{ $news->category->name }}</h1>
                    </a>
                    {!! $news->content !!}
                </div>
            </article>
        </section>
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">
            <h1 class="text-blue-900">Similar News</h1>
            @foreach ($similarNews as $similar)
                <x-news-card :news="$similar">
                </x-news-card>
            @endforeach
        </aside>
    </div>

    <x-comment-card :comments="$news->comments" :news="$news"></x-comment-card>
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
</x-news>
