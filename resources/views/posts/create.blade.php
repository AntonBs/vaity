@extends('layouts/layout')
@section('content')
    <script src="{{asset('tinymce/js/tinymce/tinymce.min.js')}}" ></script>
    <script>
        tinymce.init({
            branding: false,
            selector: '#textarea-article',
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
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image link media",
            image_title: true,
            relative_urls: false,
            image_uploadtab: false,
            language: 'ru',
            images_upload_url: '{{route('post.upload')}}',
            // images_upload_base_path: '../'
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
    <form action="{{route('post.store')}}" class="form-article" method="post" enctype="multipart/form-data" >
        @csrf
        <textarea placeholder=" Заголовок..." name="title" id="textarea-title" onkeyup="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px'" required></textarea>
            <input name="img" type="file"><br>
        <textarea placeholder=" Описание ститьи..." name="description" id="textarea-description" onkeyup="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px'" required></textarea>
        <textarea placeholder="" name="article" id="textarea-article" required></textarea>
        <button type="submit">Отправить</button>
    </form>
@endsection
