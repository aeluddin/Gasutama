@extends('dashboard.layouts.dashboard_main')
@section('content')
    
    <div class="card">
        <div class="card-header">
            <h4>Navigation &amp; Indicator</h4>
        </div>
        <div class="card-body">
            @if ($images->count() != 0)
                <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators3" data-slide-to="0" class="active"></li>
                        @php $i=1;@endphp
                        @foreach ($images->skip(1) as $image)
                            <li data-target="#carouselExampleIndicators3" data-slide-to="{{ $i++ }}"
                                class="active">
                            </li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/Sartifikasi/{{ $images[0]->image }}" class="d-block w-100" alt="First slide">
                        </div>
                        @foreach ($images->skip(1) as $image)
                            <div class="carousel-item">
                                <img src="/Sartifikasi/{{ $image->image }}" class="d-block w-100" alt="...">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            @endif

            <a href="/dashboard/sartifikasi" class="btn btn-primary mt-4">Go Back</a>
        </div>
    </div>
@endsection
