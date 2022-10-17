@extends('dashboard.layouts.dashboard_main')
@section('content')
    <div class="card text-left">
        <div class="card-body">
            <div class="row justify-content-between">
                <div class="col-md-5 py-3 rounded">
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
                    <form action="/dashboard/porto_desain/{{ $PortoDesain->id }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="title" class="mt-4">Title:</label>
                            <input type="text" id="title" class="form-control @error('title') is-invalid @enderror "
                                name="title" placeholder="Enter title" value="{{ $PortoDesain->title }}"
                                autofocus>
                            <span class="text-danger">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <div class="mt-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-control" name="category">
                                    @foreach ($categorys as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-3">
                            Jumlah Gambar = {{ $PortoDesain->images->count() }}
                        </div>
                        <div class="row mt-3">
                            @foreach ($PortoDesain->images as $image)
                                <div class="col-md-4">
                                    <div class="card mb-3 border-danger">
                                        <div class="card-body text-center">
                                            <img src="/PortoDesain/{{ $image->image }}" class="card-img-top">
                                            <p class="pt-2" style="text-align: justify; font-size: 8pt;">
                                                {{ $image->image }}</p>
                                            <a href="/dashboard/porto_desain/delete-image/{{ $image->id }}"
                                                class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="custom-file">
                            <input type="file" name="images[]" class="custom-file-input" id="customFile" accept="image/*" multiple>
                            <label class="custom-file-label" for="files">Choose file</label>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

                @include('.dashboard.desain.data')
            </div>
        </div>
    </div>
@endsection
