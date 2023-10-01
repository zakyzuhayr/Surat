@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <h3>{{ $title }}</h3>
@endsection

@section('content')

    @if (session('success'))
        <div class="row mt-3">
            <div class="col-md">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md mb-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModalDisposisi">
                <i class="fas fa-plus mr-2"></i> Tambah Disposisi
            </button>
        </div>
    </div>

    {{-- Informasi Surat Masuk --}}
    <div class="row">
        <div class="col-md mb-3">
            <x-adminlte-card theme="teal" title="Informasi Surat Masuk" collapsible>
                <div class="row">
                    <div class="col-md">
                        <x-adminlte-callout title="Status Surat">
                            <h5>{{ $surat->status_surat }}</h5>
                        </x-adminlte-callout>
                    </div>
                    <div class="col-md">
                        <x-adminlte-callout title="Sifat Surat">
                            <h5>{{ $surat->sifat_surat }}</h5>
                        </x-adminlte-callout>
                    </div>
                    <div class="col-md">
                        <x-adminlte-callout title="Sumber Surat">
                            <h5>{{ $surat->sumber_surat }}</h5>
                        </x-adminlte-callout>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <x-adminlte-callout title="No Surat">
                            <h5>{{ $surat->no_surat }}</h5>
                        </x-adminlte-callout>
                    </div>
                    <div class="col-md">
                        <x-adminlte-callout title="Kode Surat">
                            <h5>{{ $surat->kode_surat }}</h5>
                        </x-adminlte-callout>
                    </div>
                    <div class="col-md">
                        <x-adminlte-callout title="Tanggal Surat">
                            <h5>{{ $surat->tanggal_surat != null ? date("d-m-Y", strtotime($surat->tanggal_surat)) : ''}}</h5>
                        </x-adminlte-callout>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <x-adminlte-callout title="Perihal">
                            {{-- <h5>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum beatae maiores voluptas ducimus mollitia soluta magnam quia eius repellat molestias eos molestiae, id ipsa quod inventore consectetur totam veniam aperiam ab veritatis. Nulla voluptatem similique praesentium ex optio accusamus vero officiis et aliquid quae, harum obcaecati blanditiis doloremque porro maiores incidunt non ullam amet corporis cupiditate eius! Animi, laudantium obcaecati. Aut, ad quis! Architecto itaque officia aliquam adipisci quae et ex inventore magnam dicta ullam voluptas quis quaerat, voluptatibus soluta qui ipsum iste! Neque omnis reprehenderit dolore voluptas nulla. Nemo voluptates laboriosam facere laborum? Dolores eos omnis et aliquid officiis.</h5> --}}
                            <h5>{{ $surat->perihal }}</h5>
                        </x-adminlte-callout>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <x-adminlte-callout title="Tanggal Surat Masuk">
                            <h5>{{ $surat->tanggal_surat_masuk != null ? date("d-m-Y", strtotime($surat->tanggal_surat_masuk)) : ''}}</h5>
                        </x-adminlte-callout>
                    </div>
                    <div class="col-md">
                        <x-adminlte-callout title="File">
                            <a href="{{ asset("surat/masuk/$surat->file") }}" class="btn btn-success btn-sm d-block text-white" style="text-decoration:none;">Unduh</a>
                        </x-adminlte-callout>
                    </div>
                </div>
            </x-adminlte-card>
        </div>
    </div>

    {{-- Disposisi Surat Masuk --}}
    <div class="row">
        <div class="col-md mb-3">
            <x-adminlte-card theme="primary" title="Disposisi Surat Masuk">
                @foreach ($surat->disposisi->sortByDesc('sifat_status') as $item)
                    <x-adminlte-card theme="secondary" title="Disposisi {{ $loop->iteration }}" collapsible class="bg-light">
                        <div class="row">
                            <div class="col-md">
                                <x-adminlte-callout title="Penerima">
                                    <h5 id="disposisiPenerima_{{ $loop->iteration }}">{{ $item->penerima }}</h5>
                                </x-adminlte-callout>
                            </div>
                            <div class="col-md">
                                <x-adminlte-callout title="Tenggat waktu">
                                    <h5 id="disposisiTenggat_{{ $loop->iteration }}" data-asli="{{ $item->tenggat_waktu }}">{{ $item->tenggat_waktu != null ? date("d-m-Y", strtotime($item->tenggat_waktu)) : '' }}</h5>
                                </x-adminlte-callout>
                            </div>
                            <div class="col-md">
                                <x-adminlte-callout title="Isi Disposisi">
                                    <h5 id="disposisiIsi_{{ $loop->iteration }}">{{ $item->isi_disposisi }}</h5>
                                </x-adminlte-callout>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <x-adminlte-callout title="Sifat Status">
                                    <h5 id="disposisiSifat_{{ $loop->iteration }}">{{ $item->sifat_status }}</h5>
                                </x-adminlte-callout>
                            </div>
                            <div class="col-md">
                                <x-adminlte-callout title="Catatan">
                                    <h5 id="disposisiCatatan_{{ $loop->iteration }}">{{ $item->catatan }}</h5>
                                </x-adminlte-callout>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a onclick="handleEditDisposisi(this, {{ $item->id }}, {{ $loop->iteration }})" class="btn btn-warning d-block" data-toggle="modal" data-target="#editDisposisi"><i class="fas fa-edit"></i></a>
                            </div>
                            <div class="col-md-6">
                                <a onclick="handleDelete(`{{ route('surat-masuk.disposisi.destroy', $item->id) }}`)" class="btn btn-danger d-block" data-toggle="modal" data-target="#deleteDisposisi"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                    </x-adminlte-card>
                @endforeach
            </x-adminlte-card>
        </div>
    </div>

    <div class="all-modal-here">
        <!-- tambah -->
        <div class="modal fade" id="tambahModalDisposisi" tabindex="-1" aria-labelledby="tambahModalDisposisiLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('surat-masuk.disposisi.store', $surat->id) }}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahModalDisposisiLabel">Tambah Disposisi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md">
                                    <label for="">Penerima</label>
                                    <select name="penerima" id="" class="custom-select shadow-sm mb-3">
                                        <option selected disabled>Pilih Opsi</option>
                                        @foreach (\App\Models\User::all() as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="">Tenggat Waktu</label>
                                    <input type="date" class="form-control shadow-sm mb-3" name="tenggat_waktu">
                                    <label for="">Isi Disposisi</label>
                                    <input type="text" class="form-control shadow-sm mb-3" name="isi_disposisi">
                                    <label for="">Sifat Status</label>
                                    <select name="sifat_status" id="" class="custom-select shadow-sm mb-3">
                                        <option selected disabled>Pilih Opsi</option>
                                        <option value="Penting">Penting</option>
                                        <option value="Sangat Penting">Sangat Penting</option>
                                    </select>
                                    <label for="">Catatan</label>
                                    <input type="text" class="form-control shadow-sm mb-3" name="catatan">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- edit -->
        <div class="modal fade" id="editModalDisposisi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('surat-masuk.disposisi.update', $surat->id) }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Disposisi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md">
                                    <label for="">Penerima</label>
                                    <select name="penerima" id="editPenerima" class="custom-select shadow-sm mb-3">
                                        <option selected disabled>Pilih Opsi</option>
                                        @foreach (\App\Models\User::all() as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="disposisi_id" id="editDisposisiId">
                                    <label for="">Tenggat Waktu</label>
                                    <input type="date" class="form-control shadow-sm mb-3" name="tenggat_waktu" id="editTenggat">
                                    <label for="">Isi Disposisi</label>
                                    <input type="text" class="form-control shadow-sm mb-3" name="isi_disposisi" id="editIsiDispo">
                                    <label for="">Sifat Status</label>
                                    <select name="sifat_status" id="editSifat" class="custom-select shadow-sm mb-3">
                                        <option selected disabled>Pilih Opsi</option>
                                        <option value="Penting">Penting</option>
                                        <option value="Sangat Penting">Sangat Penting</option>
                                    </select>
                                    <label for="">Catatan</label>
                                    <input type="text" class="form-control shadow-sm mb-3" name="catatan" id="editCatatan">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- delete --}}
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" enctype="multipart/form-data" id="hapusFormModal">
                        @csrf
                        @method("DELETE")
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md" id="modalBodyDelete">
                                    <h4>Yakin untuk menghapus?</h4>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    
@endsection

@section('js')
    <script>
        function handleEditDisposisi(data, id, nomor) {
            // sumber data
            const disposisiPenerima = document.querySelector(`#disposisiPenerima_${nomor}`)
            const disposisiTenggat = document.querySelector(`#disposisiTenggat_${nomor}`)
            const disposisiIsi = document.querySelector(`#disposisiIsi_${nomor}`)
            const disposisiSifat = document.querySelector(`#disposisiSifat_${nomor}`)
            const disposisiCatatan = document.querySelector(`#disposisiCatatan_${nomor}`)

            // console.log(disposisiPenerima, disposisiTenggat.dataset.asli, disposisiIsi, disposisiSifat, disposisiCatatan)
            
            // inputan data
            const editDisposisiId = document.querySelector("#editDisposisiId")
            const editPenerima = document.querySelector("#editPenerima")
            const editTenggat = document.querySelector("#editTenggat")
            const editIsiDispo = document.querySelector("#editIsiDispo")
            const editSifat = document.querySelector("#editSifat")
            const editCatatan = document.querySelector("#editCatatan")

            editDisposisiId.value = id
            editPenerima.value = disposisiPenerima.textContent
            editTenggat.value = disposisiTenggat.dataset.asli
            editIsiDispo.value = disposisiIsi.textContent
            editSifat.value = disposisiSifat.textContent
            editCatatan.value = disposisiCatatan.textContent

            $("#editModalDisposisi").modal('toggle');
        }

        function handleDelete(data) {
            $("#deleteModal").modal('toggle');

            const hapusFormModal = document.querySelector('#hapusFormModal');

            hapusFormModal.setAttribute('action', data)
        }
    </script>
@endsection