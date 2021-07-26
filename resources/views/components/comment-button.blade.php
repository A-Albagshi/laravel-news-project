@props(['action'])

<a href="{{$action}}">
    <button
    {{$attributes->merge(['class'=>"w-full h-12 px-6 my-1 text-indigo-100 transition-colors duration-150 rounded-lg focus:shadow-outline"])}}>
        {{$slot}}
    </button>
</a>