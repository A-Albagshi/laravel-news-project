<footer class="w-full border-t bg-blue-900 px-10">
    <div class="w-full container mx-auto flex flex-col items-center">
        <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
            <a href="{{route('contact')}}" class="uppercase text-white px-3 hover:text-gray-300">Contact Us</a>
            <a href="{{route('about')}}" class="uppercase text-white px-3 hover:text-gray-300">About Us</a>
        </div>
        <div class="uppercase text-white pb-6">© News {{ now()->year }}</div>
    </div>
</footer>