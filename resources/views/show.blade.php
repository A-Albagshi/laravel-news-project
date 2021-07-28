<x-news>
    <div class="container mx-auto flex flex-wrap py-6">
        <div class="flex flex-col w-full md:w-2/3 items-center justify-between">
            <section class=" flex flex-col   mx-auto max-w-4xl">
                {{-- <p class="text-3xl font-bold hover:text-indigo-700"></p> --}}
                <article class="flex flex-col shadow my-4 rounded-2xl overflow-hidden  mx-auto">
                    <!-- Article Image -->
                    <a class="hover:opacity-75 justify-center cursor-pointer">
                        <img class="w-full" src="{{ asset('storage/' . $news->thumbnail) }}">
                    </a>
                    <div class="bg-white flex flex-col justify-start p-6">
                        <h1 class="text-blue-900 hover:text-black">{{ Str::title($news->title) }}</h1>
                        <p class="text-xl pb-3">
                            By <a href="/allnews?author={{ $news->author->name }}"
                                class="font-semibold text-blue-900 hover:text-black">{{ $news->author->name }}</a>,
                            Published {{ $news->created_at->diffForHumans() }}
                        </p>
                        <a href="/allnews?category={{ $news->category->slug }}"
                            class="text-blue-900 text-2xl hover:text-black font-bold uppercase pb-4 mb-2">
                            <h1>{{ $news->category->name }}</h1>
                        </a>
                        @auth
                            <div class="flex flex-row gap-4 justify-between my-10">
                                <a class="w-6/12" href="/dashboard/news/{{ $news->slug }}/edit">
                                    <button
                                        class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-xl font-large rounded-2xl text-white bg-blue-800 hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Edit News
                                    </button>
                                </a>
                                <form class="w-6/12" action="{{ route('news.destroy', $news->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-xl font-large rounded-2xl text-white bg-red-800 hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Delete News</button>
                                </form>
                            </div>
                        @endauth
                        <div class="max-w-4xl break-words">
                            {!! $news->content !!}
                        </div>
                    </div>
                </article>
            </section>
            <x-comment-card :comments="$news->comments" :news="$news"></x-comment-card>
        </div>
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">
            <h1 class="text-blue-900 boreder-blue-900 border-t-4">Similar News</h1>
            @foreach ($similarNews as $similar)
                <x-news-card :news="$similar">
                </x-news-card>
            @endforeach
        </aside>
    </div>
</x-news>
