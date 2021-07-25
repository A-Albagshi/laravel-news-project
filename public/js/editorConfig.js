var editor_config = {
    selector: "#content",
    branding: false,
    plugins: [
        "advlist autolink lists link image charmap preview hr anchor pagebreak",
        "insertdatetime media nonbreaking save table directionality",
        "searchreplace wordcount visualblocks code fullscreen",
        "emoticons paste textpattern",
        "autoresize"
    ],
    height : 800,
    toolbar:
        "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    // relative_urls: false,
    path_absolute: "/",
    file_picker_callback: function (callback, value, meta) {
        var x =
            window.innerWidth ||
            document.documentElement.clientWidth ||
            document.getElementsByTagName("body")[0].clientWidth;
        var y =
            window.innerHeight ||
            document.documentElement.clientHeight ||
            document.getElementsByTagName("body")[0].clientHeight;

        var cmsURL =
            editor_config.path_absolute +
            "laravel-filemanager?editor=" +
            meta.fieldname;
        if (meta.filetype == "image") {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }
        tinyMCE.activeEditor.windowManager.openUrl({
            url: cmsURL,
            title: "Filemanager",
            width: x * 0.6,
            height: y * 0.6,
            resizable: "yes",
            close_previous: "no",
            onMessage: (api, message) => {
                callback(message.content);
            },
        });
    },
};
tinymce.init(editor_config);
