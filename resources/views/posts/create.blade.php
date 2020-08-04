<!Doctype html>
<html lang="ru" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <script src="{{asset('tinymce/js/tinymce/tinymce.min.js')}}" ></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            height: 500,
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste imagetools"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
            ],
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '{{route('post.upload')}}',
            // images_upload_base_path: '../',
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            }
        });
    </script>
</head>
<body>
<nav>
    <ul>
        <li><a href="" class="logo"><img src="{{asset('img/vaity.png')}}">VaITy</a></li>
        <li><a href="">Второй</a></li>
        <li><a href="">Третий</a></li>
        <li><a href="">Четвертый</a></li>
        <li><a href="">Пятый</a></li>
    </ul>
</nav>
<main>
    <div>
        <a href=""></a>
    </div>
    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        Title:<input type="text" name="title"> <br>
        AuthorID<input type="text" name="author_id">
        <textarea name="article" id="mytextarea">Hello, World!</textarea>
        <input type="submit">
    </form>


</main>
</body>
</html>
