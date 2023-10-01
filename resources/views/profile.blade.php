@extends('adminlte::page')

@section('title', 'Profile')

@section('content_header')
    <h3>Profile</h3>
@endsection

@section('content')
    <div class="row">
        <div class="col-md">
            <x-adminlte-card theme="dark" icon="fas fa-lg fa-user">
                <section style="background-color: #f4f5f7;">
                    <div class="container">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col col-lg-6 mb-4 mb-lg-0">
                                <div class="card mb-3" style="border-radius: .5rem;">
                                    <div class="row g-0">
                                        <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                            <img src="img/user-solid.svg" alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                            <h5>{{ auth()->user()->name }}</h5>
                                            <p>{{ auth()->user()->nama_jabatan }}</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body p-4">
                                                <h6>Informasi</h6>
                                                <hr class="mt-0 mb-4">
                                                <div class="row pt-1">
                                                    <div class="col-6 mb-3">
                                                        <h6>Username</h6>
                                                        <p class="text-muted">{{ auth()->user()->username }}</p>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <h6>Email</h6>
                                                        <p class="text-muted">{{ auth()->user()->email }}</p>
                                                    </div>
                                                </div>
                                                <div class="row pt-1">
                                                    <div class="col-6 mb-3">
                                                        <h6>Roles</h6>
                                                        <p class="text-muted">{{ auth()->user()->roles }}</p>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <h6>No. Telpon</h6>
                                                        <p class="text-muted">{{ auth()->user()->telp }}</p>
                                                    </div>
                                                </div>
                                                {{-- <h6>Projects</h6>
                                                <hr class="mt-0 mb-4">
                                                <div class="row pt-1">
                                                    <div class="col-6 mb-3">
                                                        <h6>Recent</h6>
                                                        <p class="text-muted">Lorem ipsum</p>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <h6>Most Viewed</h6>
                                                        <p class="text-muted">Dolor sit amet</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                                    <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                                    <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </x-adminlte-card>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #f6d365;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
            }
    </style>
@endsection