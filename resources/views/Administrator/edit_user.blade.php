@extends('Template.main_template_administrator')
@section('title')
    Edit {{ $user->name }}
@endsection
@section('content')
    <div class="container edit_user">
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
                    html: @foreach ($errors->all() as $error)
                        '<li> {{ $error }} </li>' +
                        @if ($loop->last)
                            ''
                        @endif
                    @endforeach ,
                    text: 'semua data harus di isi',
                    showConfirmButton: false,
                    timer: 2500
                });
            </script>
        @endif
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('edit_user_post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" hidden value="{{ $user->id }}" name="id">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" aria-describedby="username"
                            name="username" value="{{ $user->username }}">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $user->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control" id="role" name="role">
                            <option value="admin" {{ $user->hasRole('admin') ? 'selected' : '' }}>admin</option>
                            <option value="user" {{ $user->hasRole('user') ? 'selected' : '' }}>user</option>
                        </select>
                        {{-- <input type="role" class="form-control" id="role" name="role"
                                value="{{ old('role') }}"> --}}
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
