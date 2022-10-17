        <div class="col-md-6 py-3 rounded">
            <h3>Data Profile </h3>

            <div class="d-flex flex-row-reverse ">

                <div class="col-md-7">
                    <form action="/dashboard/profile">
                        <div class="input-group mb-3">
                            <select class="form-control" name="category">
                                <option value="">All</option>
                                @foreach ($categorys as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <input type="text" class="form-control" placeholder="Search..." name="search"
                                value="{{ request('search') }}">

                            <button class="btn btn-primary" type="submit">Button</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5">
                    <a href="/dashboard/profile" class="btn btn-primary">Add</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-sm ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Title</th>
                            <th>Slug</th>
                            <th>Katagori</th>
                            <th>Total Images</th>
                            <th>Deskripsi</th>
                            <th>View Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @forelse ($data as $profile)
                            <tr
                                class="{{ Request::is('dashboard/profile/' . $profile->id . '/edit') ? 'table-active ' : '' }}">
                                <td>{{ $i++ }}</td>
                                <td>{{ $profile->title }}</td>
                                <td>{{ $profile->slug }}</td>
                                <td>{{ $profile->category->name }}</td>
                                <td>
                                    @if ($profile->images->count() == 0)
                                        Belum ada foto
                                    @else
                                        {{ $profile->images->count() }}
                                    @endif

                                </td>
                                <td>
                                    @if ($profile->deskripsi)
                                        Data Ada
                                    @else
                                        Data Tidak Ada
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex ">
                                        <a href="/dashboard/profile/{{ $profile->id }}"
                                            class="btn btn-outline-dark "><i class="bi bi-eye"></i></a>
                                        <a href="/dashboard/profile/{{ $profile->id }}/edit"
                                            class="btn btn-outline-dark ms-1 "><i class="bi bi-pencil-square"></i></a>
                                        <form action="/dashboard/profile/{{ $profile->id }}" method="post"
                                            class="ms-1 ">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-outline-dark"
                                                onclick="return confirm('Kamu Yakin ingin meng hapus?')">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Data Belum ada !</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $data->links() }}
            </div>

        </div>
