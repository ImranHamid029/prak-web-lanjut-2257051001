@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Daftar Pengguna</h2>
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
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection
