@extends('Template.main_template_administrator')
@section('title')
    Pengaturan
@endsection
@section('content')
    <div class="container pengaturan-admin">
        @if (session('success'))
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '{{ session('success') }}',

                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
        @endif
        @if (session('failed'))
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: '{{ session('failed') }}',
                    text: 'semua data harus di isi',
                    showConfirmButton: false,
                    timer: 2500
                });
            </script>
        @endif
        <div class="row">

            <div class="col">
                @if ($errors->any())
                    {{-- <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div> --}}
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="h2">
                    Pengaturan
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                {{-- <a class="btn btn-primary float-end mb-4" href="">Tambah</a> --}}
                <button type="button" class="btn btn-primary float-end mb-4" data-bs-toggle="modal"
                    data-bs-target="#modal">
                    Tambah
                </button>
            </div>

        </div>
        <div class="table-responsive">

            <table id="myTable" class="table table-striped-columns" style="width:100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('edit_user', $user->id) }}">Edit</a>
                                <a class="btn btn-danger" href="{{ route('hapus_user', $user->id) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

    </div>


    <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tambah_user') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" aria-describedby="username"
                                name="username" value="{{ old('username') }}">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') }}">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-control" id="role" name="role">
                                <option value="admin">admin</option>
                                <option value="user">user</option>
                            </select>
                            {{-- <input type="role" class="form-control" id="role" name="role"
                                value="{{ old('role') }}"> --}}
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        new DataTable('#myTable', {
            language: {
                info: 'Halaman _PAGE_ dari _PAGES_',
                infoEmpty: 'Tidak ada data',
                infoFiltered: '(Filter dari _MAX_ total records)',
                lengthMenu: 'Menampilkan _MENU_ data per halaman',
                zeroRecords: 'Tidak ditemukan',
                paginate: {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                },
                "search": "Cari :",
            }
        });
    </script>
@endsection
