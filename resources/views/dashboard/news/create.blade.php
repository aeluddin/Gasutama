@extends('dashboard.layouts.dashboard_main')
@section('content')

    <div class="card">
        <div class="card-body">
            <div class="grid justify-content-between">
                @include('dashboard.news.data')

                <div class="py-3 rounded">
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
                    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class=" col-6 form-group">
                            <label for="title" class="mt-4">Title:</label>
                            <input type="text" id="title" class="form-control @error('title') is-invalid @enderror "
                                name="title" placeholder="Enter title" value="{{ old('title') }}" autofocus>
                            <span class="text-danger">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </span>
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
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
