@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Daftar Pekerja</h4>
    <a href="{{ route('pekerja.create') }}" class="btn btn-primary">+ Tambah Pekerja</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    @forelse($pekerjas as $p)
        <tr>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->jabatan }}</td>
            <td>{{ $p->email }}</td>
            <td>{{ $p->telepon }}</td>
            <td>
                <a href="{{ route('pekerja.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('pekerja.destroy', $p->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5" class="text-center">Tidak ada data</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
