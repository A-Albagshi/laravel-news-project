@props(['action', 'comment'])

<form action="{{ $action }}" method="POST">
    @csrf
    @if ($comment ?? false)
        @method('PUT')
    @endif
    <div class="">
        <div class="px-4 py-5 bg-white space-y-6 sm:p-6 border-t-2">
            <h1>Post New Comment</h1>

            <div class="grid grid-cols-3 gap-6">
                <div class="col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" autocomplete="name" placeholder="Your Name"
                        value="{{ $comment->commenter ?? '' }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>
            <div>
                <label for="comment" class="block text-sm font-medium text-gray-700">
                    Comment
                </label>
                <div class="mt-1">
                    <textarea id="comment" name="comment" rows="3"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                        placeholder="Leave Your Comment Here">{{ $comment->body ?? '' }}</textarea>
                </div>
                @if ($comment ?? false)
                    <label for="is_approved">Is Approved</label>
                    <input id="is_approved" name="is_approved" type="checkbox" class="form-checkbox"
                        {{ boolval($comment->is_approved ?? '') ? 'checked' : '' }}>
                    <label for="is_visible">Is Visible</label>
                    <input id="is_visible" name="is_visible" type="checkbox" class="form-checkbox"
                        {{ boolval($comment->is_visible ?? '') ? 'checked' : '' }}>
                @endif
            </div>
            <button
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Post Comment
            </button>

        </div>
    </div>

</form>
