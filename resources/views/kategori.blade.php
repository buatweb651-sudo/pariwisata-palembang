@extends('layouts.admin')
@section('title', 'Kelola Kategori')
@section('content')

<nav class="kategori-breadcrumb mb-3">
    <a href="{{ route('beranda') }}">Beranda</a> / <span class="text-muted">Kelola Kategori</span>
</nav>

<div class="kategori-header">
    <h4>Daftar Kategori</h4>
    <a href="{{ route('kategori.create') }}" class="btn-tambah-kategori">
        <i class="bi bi-plus-lg"></i> Tambah Kategori
    </a>
</div>

<div class="kategori-card">
    <table class="table table-kategori mb-0">
        <thead>
            <tr>
                <th style="width:60px;">No</th>
                <th>Nama Kategori</th>
                <th style="width:120px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kategoriList as $i => $kategori)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $kategori->nama_kategori }}</td>
                    <td>
                        <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn-aksi-icon btn-edit-kategori" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin hapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-aksi-icon btn-hapus-kategori" title="Hapus">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="text-center text-muted py-4">Belum ada kategori.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection