<script src="{{asset('js/tinymce/tinymce.min.js')}}" ></script>
<script>
    tinymce.init({
        branding: false,
        selector: '#textarea',
        height: '750px',
        resize: false,
        resize_img_proportional: true,
        content_css: '{{asset('css/style.css')}}',
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
        file_picker_types: 'image',
        images_upload_url: '{{route('post.upload')}}',
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
                    cb(blobInfo.blobUri(), { title: file.name, width: ' ' });
                };
            };
            input.click();
        }
    });

</script>

<textarea  onkeyup="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px'"  placeholder=" Заголовок статьи... Максимум 50 символов" id="textarea-title" type="text" name="title">{{old('title') ?? $post->title ?? ''}}</textarea>

<p style="padding-left: 0; font-size: 18px; display: inline">Загрузить титульное изображение:</p>
<input type="file" name="img" id="img" value="">
<span id="output">
                <img class="thumb" src="{{old('img')?? $post->img  ?? ''}}">
        </span>

<script>
    function handleFileSelect(evt) {
        var file = evt.target.files; // FileList object
        var f = file[0];
        // Only process image files.
        if (!f.type.match('image.*')) {
            alert("Image only please....");
            return
        }
        var reader = new FileReader();
        // Closure to capture the file information.
        reader.onload = (function(theFile) {
            return function(e) {
                // Render thumbnail.
                var div = document.getElementById('output');
                div.innerHTML = ['<img class="thumb" src="', e.target.result, '" />'].join('');
            };
        })(f);
        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
    }
    document.getElementById('img').addEventListener('change', handleFileSelect, false);
</script>
<textarea onkeyup="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px'" placeholder=" Описание статьи... Максимум 100 символов" id="textarea-description" type="text" name="description" required>{{old('description')?? $post->description  ?? ''}}</textarea>
<textarea name="article" id="textarea" >{{old('article')?? $post->article ?? ''}}</textarea>
<button type="submit">Отправить</button>
