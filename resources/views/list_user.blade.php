@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Daftar Pengguna</h2>
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambah Pengguna Baru</a>


    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->npm }}</td>
                <td>{{ $user->nama_kelas }}</td>
                <td><a href="{{ route('users.show', $user->id)}}" class="btn btn-warning mb-3"></a></td>
            
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection
