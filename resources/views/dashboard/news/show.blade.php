@extends('dashboard.layouts.dashboard_main')
@section('content')

    <div class="card">
        <div class="container">
            <h1>
                {{ $data->title }}
            </h1>
            {!! $data->content !!}
        </div>
        <div class="card-footer">
            <a href="{{ route('news.index') }}" class="btn btn-success"> Kembali</a>
            <a href="{{ route('news.edit',$data->id) }}" class="btn btn-success"> Edit</a>
        </div>
    </div>
@endsection
