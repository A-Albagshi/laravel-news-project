<x-news>
    <div class="container mx-auto flex flex-wrap my-3">
        <!-- News Section -->
        <section class="w-full grid lg:grid-cols-6 grid-cols-1 gap-8 px-6">
            @if ($news->count())
                <x-news-card class="lg:col-span-4 max-w-5xl" :news="$news[0]"></x-news-card>
                @if ($news->count() > 1)
                    <x-news-card class="lg:col-span-2 max-w-5xl" :news="$news[1]"></x-news-card>
                @endif
                @foreach ($news->skip(2) as $News)
                    <x-news-card class="{{ $loop->iteration < 3 ? 'lg:col-span-3' : 'lg:col-span-2' }} "
                        :news="$News">
                    </x-news-card>
                @endforeach
            @endif
        </section>
    </div>
</x-news>
