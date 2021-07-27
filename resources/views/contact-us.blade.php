<x-news>
    <div class="w-full">
        <div class="max-w-7xl mx-auto my-24 px-4 sm:px-6 lg:px-8 ">
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            @if (session('success'))
                                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                                    role="success">
                                    <strong class="font-bold">{{session('success')}}</strong>
                                </div>
                            @endif
                            <h1 class="text-blue-900">Your Opinion Matter</h1>
                            <h3 class="text-blue-900">Send Us A Message</h3>
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-6">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" name="name" id="name" autocomplete="name" placeholder="Your Name"
                                        required
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-6">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" name="email" id="email" autocomplete="email"
                                        placeholder="Your Email" required
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-6">
                                    <label for="number" class="block text-sm font-medium text-gray-700">Phone
                                        Number</label>
                                    <input type="text" name="number" id="number" autocomplete="number"
                                        placeholder="Your Phone Number" required
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700">
                                    Message
                                </label>
                                <div class="mt-1">
                                    <textarea id="message" name="message" rows="3"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                        placeholder="Leave Your Message Here" required></textarea>
                                </div>
                            </div>
                            <button
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Post Message
                            </button>

                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</x-news>
