@extends('layout.main')
@section('content')
    <div class="card">
        @forelse ($datas as $data)
            <tr >
                <td>{{ $data->title }}</td>

                <td>
                    @forelse ($data->images as $images)
                        <img src="/Sartifikasi/{{ $images->image }}" class="d-block w-100" alt="First slide">
                    @empty
                        data tidak ada
                    @endforelse
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">Data Belum ada !</td>
            </tr>
        @endforelse
    </div>
@endsection
