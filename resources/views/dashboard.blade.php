<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-center">
                    <h1 class="bg-blue-900 text-white my-0">Total News {{$totalNews}}</h1>
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <x-chart :data="$category">
                        {{ __('category') }}
                    </x-chart>
                    <x-chart :data="$comments">
                        {{ __('Comments') }}
                    </x-chart>
                </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
