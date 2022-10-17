@extends('dashboard.layouts.dashboard_main')
@section('content')
    <div class="card ">
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
                    <form action="/dashboard/porto_desain" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="mt-4">Title:</label>
                            <input type="text" id="title" class="form-control @error('title') is-invalid @enderror "
                                name="title" placeholder="Enter title" value="{{ old('title') }}" autofocus>
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
                        
                        <div class="custom-file">
                            <input type="file" name="images[]" class="custom-file-input" accept="image/*" id="customFile" multiple>
                            <label for="files" class="custom-file-label">Upload Images</label>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>

                @include('dashboard.desain.data')

            </div>
        </div>
    </div>
@endsection
