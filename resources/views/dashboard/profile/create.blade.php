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
                <form action="/dashboard/profile" method="POST" enctype="multipart/form-data">
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
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-control" name="category_id">
                                @foreach ($categorys as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="coverImage" class="form-label">Cover Image</label>
                        <input class="form-control" type="file" id="coverImage" name="coverImage">
                      </div>
                    <div class="custom-file mt-3">
                        <input type="file" name="images[]" class="custom-file-input" accept="image/*" id="customFile" multiple>
                        <label for="files" class="custom-file-label">Upload Images:</label>
                    </div>
                    <div class="mt-3">
                        <label for="dsekripsi" class="form-label">Deskripsi</label>
                        <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}">
                        @error('deskripsi')
                          <p class="text-danger pt-1" style="font-size: 12px">{{ $message }}
                        @enderror
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    
                </form>
            </div>
    
            @include('dashboard.profile.data')
    
        </div>
      </div>
    </div>
    
    
@endsection
