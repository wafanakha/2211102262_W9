@extends('layout')

@section('content')
<h4>{{ isset($pekerja) ? 'Edit' : 'Tambah' }} Pekerja</h4>

<form action="{{ isset($pekerja) ? route('pekerja.update', $pekerja->id) : route('pekerja.store') }}" method="POST">
    @csrf
    @if(isset($pekerja)) @method('PUT') @endif

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $pekerja->nama ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Jabatan</label>
        <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan', $pekerja->jabatan ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $pekerja->email ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Telepon</label>
        <input type="text" name="telepon" class="form-control" value="{{ old('telepon', $pekerja->telepon ?? '') }}">
    </div>

    <button type="submit" class="btn btn-success">{{ isset($pekerja) ? 'Update' : 'Simpan' }}</button>
    <a href="{{ route('pekerja.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
