@extends('dashboard.layouts.dashboard_main')
@section('content')
    <div class="card ">
        <div class="card-body">
            <h1><span class="text-primary">{{ $product->title }}</span> </h1>
            <div class="row mt-4">
                @foreach ($images as $image)
                    <div class="col-md-2">
                        <div class="card text-white mb-3 border-danger" style="max-width: 20rem;">
                            <div class="card-body text-center">
                                <img src="/product_images/{{ $image->image }}" class="card-img-top">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <h2 class=" fw-bold mt-3">Deskripsi
            </h2>
            <div class="ms-2">{!! $product->deskripsi !!}</div>
            <a href="/dashboard/profile" class="btn btn-primary mt-4">Go Back</a>
        </div>
    </div>
@endsection
