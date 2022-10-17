@extends('dashboard.layouts.dashboard_main')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-between ">
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
                    <form action="/dashboard/profile/{{ $Profile_proyek->id }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="title" class="mt-4">Title:</label>
                            <input type="text" id="title" class="form-control @error('title') is-invalid @enderror "
                                name="title" placeholder="Enter title" value="{{ $Profile_proyek->title }}"
                                autofocus>
                            <span class="text-danger">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <div class="mt-3">
                                <label for="category_id" class="form-label">Category</label>
                                <select class="form-control" name="category_id">
                                    @foreach ($categorys as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-3">
                            Jumlah Gambar = {{ $Profile_proyek->images->count() }}
                        </div>
                        <div class="row mt-3">
                            @foreach ($Profile_proyek->images as $image)
                                <div class="col-md-4">
                                    <div class="card mb-3 border-danger">
                                        <div class="card-body text-center">
                                            <img src="_images/{{ $image->image }}" class="card-img-top">
                                            <p class="pt-2" style="text-align: justify; font-size: 8pt;">
                                                {{ $image->image }}</p>
                                            <a href="/dashboard/profile/delete-image/{{ $image->id }}"
                                                class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="custom-file">
                            <input type="file" name="images[]" class="custom-file-input" accept="image/*" id="customFile" multiple>
                            <label for="files" class="custom-file-label">Upload Images</label>
                        </div>
                        <div class="mt-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input id="deskripsi" type="hidden" name="deskripsi" value="{{ $Profile_proyek->deskripsi }}">

                            @error('deskripsi')
                                <p class="text-danger pt-1" style="font-size: 12px">{{ $message }}
                                @enderror
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Save Product</button>
                        </div>
                    </form>
                </div>

                @include('/dashboard/profile.data')
            </div>
        </div>
    </div>
@endsection
