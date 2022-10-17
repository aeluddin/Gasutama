        <div class="col-md-6 py-3 rounded">
            <h3>Data Our Client </h3>
            <div class="d-flex flex-row-reverse ">
                <div class="col-md-7">
                    <form action="/dashboard/user">
                        <div class="input-group mb-3">
                            {{-- <select class="form-select" name="search">
                                <option value="">All</option>
                                @foreach ($categorys as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </select> --}}
                            <input type="text" class="form-control" placeholder="Search..." name="search"
                                value="{{ request('search') }}">

                            <button class="btn btn-primary" type="submit">Button</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5">
                    <a href="/dashboard/user" class="btn btn-primary">Add</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @forelse ($datas as $data)
                            <tr class="{{ Request::is('dashboard/user/' . $data->id . '/edit') ? 'table-active ' : '' }}">
                                <td>{{ $i++ }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>
                                    @if ($data->name != 'Admin123')
                                    {{-- {{ $data->id = 0 }} --}}
                                    <div class="d-flex ">
                                        <a href="/dashboard/user/{{ $data->id }}/edit"
                                            class="btn btn-outline-dark ms-1 "><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg></a>
                                        <form action="/dashboard/user/{{ $data->id }}" method="post"
                                            class="ms-1 ">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-outline-dark"
                                                onclick="return confirm('Kamu Yakin ingin meng hapus?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd"
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Data Belum ada !</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $datas->links() }}
            </div>
        </div>
