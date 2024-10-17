@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Form User</h2>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf  <!-- Token CSRF Laravel -->
        
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="npm">NPM:</label>
            <input type="text" id="npm" name="npm" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="kelas_id">Kelas:</label>
            <select name="kelas_id" id="kelas_id" required>
                <option value="" disabled selected>Pilih kelas</option>
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                @endforeach
            </select>
            @if ($errors->has('kelas_id'))
                <p class='text-danger'>{{ $errors->first('kelas_id') }}</p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
