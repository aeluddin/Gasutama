@extends('dashboard.layouts.dashboard_main')
@section('content')
    <script>
        tinymce.init({
            selector: '#content',
            // resize: 'both',
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking',
                'table emoticons template paste help codesample'
            ],
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '/upload/post-image/' + {{ $data->id }} + '/' ,
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    render.onload = function() {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                };
                input.click();
            },
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link image | print preview media fullpage | ' +
                'forecolor backcolor emoticons | help | codesample',

            menubar: 'favs file edit view insert format tools table help',
            setup: (editor) => {
                editor.on('SkinLoaded', (e) => {
                    disable
                });
            },
        });
        tinymce.activeEditor.execCommand('mceCodeEditor');
    </script>
    <div class="card text-left">
        <div class="card-body">
            <div class=" justify-content-between">
                @include('.dashboard.news.data')

                <div class= " rounded">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                <h4 class="alert-heading">Success!</h4>
                                <p class="mb-0">{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif
                    <h3>{{ $title }}</h3>
                    <form action="/dashboard/news/{{ $data->id }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group col-6">
                            <label for="title" class="mt-4">Title:</label>
                            <input type="text" id="title" class="form-control @error('title') is-invalid @enderror "
                                name="title" placeholder="Enter title" value="{{ $data->title }}" autofocus>
                            <span class="text-danger">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="title" class="mt-4">Cover Image:</label><br>
                            <img src="{{ asset('news_image/'.$data->imgc) }}" class=" mx-3 rounded" width="150" height="150" >
                        </div>
                        <div class="col-4 mx-3 custom-file ">
                            <input type="file" name="imgc" accept="image/*" class="custom-file-input mb-1 @error('imgc') is-invalid @enderror" >
                            <label for="files" class="custom-file-label">Cover Images:</label>
                            <span class="text-danger">
                                @error('imgc')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="title" class="mt-4">Content:</label>
                            <textarea class="form-group" id="content" name="content">{{ $data->content }}</textarea>
                        </div>
                            <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
