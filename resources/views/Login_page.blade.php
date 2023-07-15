@extends('Template.main_template_login')
@section('title')
    Login
@endsection
@section('content')

    <div class="login">
        <div class="container">

            <div class="row">
                <div class="loading_page">
                    <span class="loader">
                    </span>
                </div>


                @if (count($errors) > 0)
                    @foreach ($errors->all() as $message)
                        <script>
                            Swal.fire(
                                'Maaf',
                                'Sepertinya akun anda tidak terdaftar atau username dan password anda salah',
                                'warning'
                            )
                        </script>
                    @endforeach
                @endif

                <div class="col">

                </div>
                <div class="col d-flex justify-content-center align-items-center">
                    <div class="card shadow ">
                        <div class="card-body">
                            <form action="{{ route('login_post') }}" method="POST">
                                @csrf
                                <div class="mb-3 logo">
                                    <img src="{{ asset('gambar/Logo.jpg') }}" alt="">
                                </div>
                                <div class="mb-3 judul">
                                    E-SURAT
                                </div>
                                <div class="mb-3 sub-judul">
                                    Pusat Penelitian dan Pengabdian Masyarakat Politeknik Negeri Banjarmasin
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" aria-describedby="username"
                                        name="username" required value="{{ old('username') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="button">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                <div class="lupa">
                                    Lupa Password ? <a href="#">Hubungi admin</a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
