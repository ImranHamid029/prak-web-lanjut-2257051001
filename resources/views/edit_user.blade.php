@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Form User</h2>
    <form action="{{ route('user.update', $user['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf  <!-- Token CSRF Laravel -->
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" class="form-control"  value="{{ old('nama', $user->nama) }}">
        </div>

        <div class="form-group">
            <label for="ipk">IPK:</label>
            <input type="text" id="ipk" name="ipk" class="form-control" value="{{ old('ipk', $user->ipk) }}">
        </div>

        <div class="form-group">
            <label for="kelas_id">Kelas:</label>
            <select name="kelas_id" id="kelas_id" required>
                <option value="" disabled selected>Pilih kelas</option>
                    @foreach ($kelas as $kelasItem)
                        <option value="{{ $kelasItem->id }}">
                            {{ $kelasItem->id == $user->kelas_id ? 'selected' : ''}}
                            {{ $kelasItem->nama_kelas }}

                        </option>
                    @endforeach
                    </select>
                        @if ($errors->has('kelas_id'))
                            <p class='text-danger'>{{ $errors->first('kelas_id') }}</p>
                        @endif
        </div>
    <br>
        <div class="form-group">
            <label for="foto">Foto:</label><br>
            <input type="file" id="foto" name="foto" class="form-control">
            @if ($user->foto)
                <img src="{{ asset($user->foto) }}" alt="User Foto" width="100" class="mt-2">
            @endif
        </div>
    <br>
        <button type="submit" class="btn btn-primary">Submit</button><br><br>
    </form>
</div>
@endsection
