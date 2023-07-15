@extends('Template.main_template_administrator')
@section('title')
    Beranda
@endsection
@section('content')
    <div class="container beranda-admin">
        <div class="row">
            <div class="col">
                <div class="h2">
                    Beranda
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <img src="{{ asset('gambar/surat_masuk.png') }}" class="image" alt="">
                        <div class="description">
                            <p>Surat Masuk</p>
                        <p>{{$surat_masuk}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <img src="{{ asset('gambar/surat_keluar.png') }}" class="image" alt="">
                        <div class="description">
                            <p>Surat Keluar</p>
                        <p>{{$surat_keluar}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <img src="{{ asset('gambar/data_user.png') }}" class="image" alt="">
                        <div class="description">
                            <p>Data User</p>
                        <p>{{$jumlah_user}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
