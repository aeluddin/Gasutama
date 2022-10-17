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
                    <form method="POST" action="/dashboard/user/{{ $user->id }}">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input value="{{ $user->name }}" type="text" class="form-control" name="name"
                                placeholder="Name" " required >
                                 @if ($errors->has('name'))
                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input value="{{ $user->email }}" type="email" class="form-control" name="email"
                                placeholder="Email address" required>
                            @if ($errors->has('email'))
                                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">password</label>
                            <input type="password" class="form-control" name="password" placeholder="password" required>
                            @if ($errors->has('password'))
                                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Save datas</button>
                    </form>
                </div>
                @include('dashboard.user.data')
            </div>
        </div>
    </div>
@endsection
