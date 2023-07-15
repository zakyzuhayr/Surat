@extends('Template.main_template_administrator')
@section('title')
    Edit
@endsection
@section('content')
    <div class="container edit_surat">
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('edit_surat_post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" hidden value="{{ $surat->id }}" name="id">
                    <div class="mb-3">
                        <label for="no_surat" class="form-label">NO Surat</label>
                        <input type="text" class="form-control" id="no_surat" aria-describedby="no_surat"
                            name="no_surat" value="{{ $surat->no_surat }}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                        <input type="date" class="form-control" id="tanggal_surat"
                            name="tanggal_surat"value="{{ $surat->tanggal_surat }}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_surat_terima" class="form-label">Tanggal Terima</label>
                        <input type="date" class="form-control" id="tanggal_surat_terima"
                            name="tanggal_surat_terima"value="{{ $surat->tanggal_terima }}">
                    </div>
                    <div class="mb-3">
                        <label for="perihal" class="form-label">Perihal</label>
                        <input type="text" class="form-control" id="perihal"
                            name="perihal"value="{{ $surat->perihal }}">
                    </div>
                    <div class="mb-3">
                        <label for="asal_surat" class="form-label">Asal Surat</label>
                        <input type="text" class="form-control" id="asal_surat"
                            name="asal_surat"value="{{ $surat->asal_surat }}">
                    </div>
                    <div class="mb-3">
                        <label for="file_surat" class="form-label">File surat .pdf</label>
                        <input type="file" accept=".pdf" class="form-control" id="file_surat" name="file_surat">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
