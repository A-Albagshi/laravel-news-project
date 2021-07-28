<x-news>
    <div class="w-full py-4 bg-gray-100 my-6">
        <div class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div
                class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                <form method="GET" action="/allnews">
                    <div class="flex flex row">
                        <select name="category" id="category" class="rounded-full shadow-xl mr-4 border-0 py-4 px-10">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->slug}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <div class="bg-white flex items-center rounded-full shadow-xl">
                            <input
                                class="search-input rounded-l-full border-none outline-none w-full py-4 px-6 text-gray-700 leading-tight focus:outline-none"
                                name="search" value="{{ request('search') }}" id="search" type="text"
                                placeholder="Search">
                            <div class="p-4">
                                <button
                                    class="bg-blue-900 text-white rounded-full p-2 hover:bg-blue-700 focus:outline-none w-12 h-12 flex items-center justify-center">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-row items-center p-4">
                            <label for="from" class="block text-sm font-medium text-gray-700 mr-4">From</label>
                            <div class="bg-white rounded-full shadow-xl">
                                <input class="w-full rounded-full border-0 py-4 px-6" type="date" name="from" id="from" value="{{ request('from') }}">
                            </div>
                        </div>
                        <div class="flex flex-row items-center p-4">
                            <label for="from" class="block text-sm font-medium text-gray-700 mr-4">To</label>
                            <div class="bg-white rounded-full shadow-xl">
                                <input class="w-full rounded-full border-0 py-4 px-6" type="date" name="to" id="to" value="{{ request('to') }}">
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    <div class="container mx-auto flex flex-wrap my-3 ">
        <!-- News Section -->
        <section class="w-full grid lg:grid-cols-6 grid-cols-1 gap-8 px-6 h-100">
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
            @else
                @if (request('search') != '')
                    <h1 class="text-center col-span-6">No News With {{ request('search') }} in it.</h1>
                @else
                    <h1 class="text-center col-span-6">No News yet. Please check back later.</h1>
                @endif
            @endif
        </section>
        <div class="flex-1 px-3 my-3">
            {{ $news->links() }}
        </div>
    </div>
</x-news>
