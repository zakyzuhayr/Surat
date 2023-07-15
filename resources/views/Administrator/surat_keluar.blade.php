@extends('Template.main_template_administrator')
@section('content')
    <div class="container surat-masuk-admin">

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
                <div class="h2">
                    Surat Keluar
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <button type="button" class="btn btn-primary float-end mb-4" data-bs-toggle="modal" data-bs-target="#modal">
                    Tambah
                </button>
            </div>

        </div>



        <div class="table-responsive">

            <table id="myTable" class="table table-striped-columns" style="width:100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NO Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Asal Surat</th>
                        <th>Perihal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1
                    @endphp
                    @foreach ($surat_keluar as $surat)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$surat->no_surat}}</td>
                        <td>{{$surat->tanggal_surat}}</td>

                        <td>{{$surat->asal_surat}}</td>
                        <td>{{$surat->perihal}}</td>
                        <td>
                            <a class="btn btn-success" href="{{ route('view_surat_keluar_pdf', $surat->id) }}" target="_blank">View</a>
                            <a class="btn btn-warning" href="{{ route('edit_surat_keluar_view', $surat->id) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('surat_keluar_hapus', $surat->id) }}">Delete</a>
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
                    <form action="{{route('surat_keluar_tambah')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="no_surat" class="form-label">NO Surat</label>
                            <input type="text" class="form-control" id="no_surat" aria-describedby="no_surat"
                                name="no_surat" value="{{old('no_surat')}}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                            <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" value="{{old('tanggal_surat')}}">
                        </div>

                        <div class="mb-3">
                            <label for="perihal" class="form-label">Perihal</label>
                            <input type="text" class="form-control" id="perihal" name="perihal" value="{{old('perihal')}}">
                        </div>
                        <div class="mb-3">
                            <label for="asal_surat" class="form-label">Asal Surat</label>
                            <input type="text" class="form-control" id="asal_surat" name="asal_surat" value="{{old('asal_surat')}}">
                        </div>
                        <div class="mb-3">
                            <label for="file_surat" class="form-label">File surat .pdf</label>
                            <input type="file" accept=".pdf" class="form-control" id="file_surat" name="file_surat">
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
