<!DOCTYPE HTML>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://cdn.tiny.cloud/1/h6s7lt4dpnp3h0yulywraylzo43tlkkfdlwepyakrkkge7qp/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        var editor_config = {
            selector: '#content',
            branding: false,
            plugins: [
                "advlist autolink lists link image charmap preview hr anchor pagebreak",
                "insertdatetime media nonbreaking save table directionality",
                "searchreplace wordcount visualblocks code fullscreen",
                "emoticons paste textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            // relative_urls: false,
            path_absolute: "/",
            file_picker_callback: function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                    'body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }
                tinyMCE.activeEditor.windowManager.openUrl({
                    url: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.6,
                    height: y * 0.6,
                    resizable: "yes",
                    close_previous: "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        };
        tinymce.init(editor_config);
    </script>

</head>
<div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="title" class="block text-sm font-medium text-gray-700">
                                Title
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="title" id="title"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                    placeholder="News Title" required>
                            </div>
                        </div>
                    </div>
                    <label class="block text-sm font-medium text-gray-700">
                        <span class="text-gray-700">Select</span>
                        <select name="category_id" id="category_id" class="form-select focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full mt-1 rounded-none rounded-r-md sm:text-sm border-gray-300">
                          <option value="1">Option 1</option>
                          <option value="2">Option 2</option>
                        </select>
                      </label>
                      

                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700">
                            News body
                        </label>
                        <div class="mt-1">
                            <textarea id="content" name="content" placeholder="News Body"></textarea>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            News Thumbnail
                        </label>
                        <div
                            class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                    viewBox="0 0 48 48" aria-hidden="true">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="thumbnail"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Upload Thumbnail Image</span>
                                        <input id="thumbnail" name="thumbnail" type="file" class="sr-only" 
                                        {{-- required --}}
                                        >
                                    </label>
                                    
                                </div>
                                <p class="text-xs text-gray-500">
                                    PNG, JPG, GIF up to 5MB
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
