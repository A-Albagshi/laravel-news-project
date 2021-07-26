<nav class="w-full bg-blue-900 shadow border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <div class="flex justify-between h-16">
            <nav class="flex">
                <div class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                    <a href="/">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('news')" :active="request()->routeIs('news')">
                            {{ __('Latest News') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('allnews')" :active="request()->routeIs('allnews')">
                            {{ __('All News') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('allnews')" :active="request()->routeIs('allnews')">
                            {{ __('Contanct Us') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('allnews')" :active="request()->routeIs('allnews')">
                            {{ __('About Us') }}
                        </x-nav-link>
                    </div>
                </div>
            </nav>

            <div class="flex items-center text-lg no-underline text-white pr-6">
                @if (Route::has('login'))
                    <div class="hidden  px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="hover:text-gray-200 hover:underline px-4">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="hover:text-gray-200 hover:underline px-4">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="hover:text-gray-200 hover:underline px-4">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </div>

</nav>
