@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <h1>{{ $title }}</h1>
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

    <div class="row mb-3">
        <div class="col-md">
            {!! $buttons !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="card card-lime card-outline">
                @if (str_contains(url()->current(), 'surat-masuk'))

                    @php
                        $notif = \App\Models\SuratMasuk::all();
                        $wait = count($notif->where('check_status', 'Menunggu Verifikasi'));
                        $korek = count($notif->where('check_status', 'Koreksi'));
                    @endphp

                    <div class="card-header p-0">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link {{ route('surat-masuk.index') == url()->current() ? 'active' : '' }}" href="{{ route('surat-masuk.index') }}">Disetujui</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ route('surat-masuk.waitVerif') == url()->current() ? 'active' : '' }}" href="{{ route('surat-masuk.waitVerif') }}">Menunggu Verifikasi <span class="badge badge-danger">{{ $wait == 0 ? '' : $wait }}</span></a>
                            </li>
                            @canany(['is_admin', 'is_p3mp', 'is_sekretaris'])
                                <li class="nav-item">
                                    <a class="nav-link {{ route('surat-masuk.waitCorrection') == url()->current() ? 'active' : '' }}" href="{{ route('surat-masuk.waitCorrection') }}">Koreksi <span class="badge badge-danger">{{ $korek == 0 ? '' : $korek }}</span></a>
                                </li>
                            @endcanany
                        </ul>
                    </div>
                @endif


                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('templates.modal')
  
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    {{ $dataTable->scripts() }}
@endsection