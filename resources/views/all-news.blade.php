<x-news>


    <div class="w-full py-4 border-t border-b bg-white my-6">
        <div class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div
                class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                <form method="GET" action="/allnews">
                    <div class="bg-white flex items-center rounded-full shadow-xl">
                        <input
                            class="rounded-l-full border-none outline-none w-full py-4 px-6 text-gray-700 leading-tight focus:outline-none"
                            name="search" value="{{ request('search') }}" id="search" type="text" placeholder="Search" required>
                        <div class="p-4">
                            <button
                                class="bg-blue-500 text-white rounded-full p-2 hover:bg-blue-400 focus:outline-none w-12 h-12 flex items-center justify-center">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    <div class="container mx-auto flex flex-wrap my-3">
        <!-- News Section -->

        <section class="w-full grid lg:grid-cols-6 grid-cols-1  gap-4  px-3  ">
            <x-news-card class="lg:col-span-6 max-w-5xl justify-self-center" :news="$news[0]"></x-news-card>
            @foreach ($news->skip(1) as $News)

                <x-news-card class="{{ $loop->iteration < 3 ? 'lg:col-span-3' : 'lg:col-span-2' }} " :news="$News">
                </x-news-card>
            @endforeach
        </section>
        <div class="flex-1 px-3 my-3">
            {{ $news->links() }}
        </div>
    </div>
</x-news>
