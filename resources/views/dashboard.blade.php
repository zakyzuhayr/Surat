@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md">
            <x-adminlte-small-box title="Selamat Datang" text="Di Website Aplikasi Surat Masuk dan Keluar" icon="fas fa-users text-light" theme="dark" class=""/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-adminlte-small-box title="{{ $suratm }}" text="Surat Masuk" icon="fas fa-envelope text-light" theme="navy" url="#" url-text="Lihat Selengkapnya" class=""/>
        </div>
        <div class="col-md-6">
            <x-adminlte-small-box title="{{ $suratk }}" text="Surat Keluar" icon="fas fa-envelope text-light" theme="olive" url="#" url-text="Lihat Selengkapnya" class=""/>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop