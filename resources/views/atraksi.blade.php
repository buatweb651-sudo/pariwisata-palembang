@extends('layouts.app')

@section('title', 'Daftar Atraksi')

@section('content')
<div class="container my-5">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Atraksi</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: var(--maroon);">Daftar Atraksi Wisata</h2>
        <a href="{{ route('atraksi.create') }}" class="btn btn-maroon">
            <i class="bi bi-plus-lg me-1"></i> Tambah Atraksi
        </a>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse ($atraksiList as $atraksi)
            <div class="col">
                <div class="card card-atraksi h-100 shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <span class="badge badge-atraksi align-self-start mb-2">{{ $atraksi->kategori }}</span>
                        <h5 class="card-title fw-semibold">{{ $atraksi->nama }}</h5>
                        <p class="card-text text-muted flex-grow-1">{{ Str::limit($atraksi->deskripsi, 80) }}</p>
                        <p class="fw-bold harga mb-3">
                            {{ $atraksi->harga == 0 ? 'Gratis' : 'Rp ' . number_format($atraksi->harga, 0, ',', '.') }}
                        </p>

                        <div class="d-flex gap-2">
                            <a href="{{ route('atraksi.edit', $atraksi->id) }}" class="btn btn-sm btn-outline-maroon flex-fill">
                                Edit
                            </a>
                            <form action="{{ route('atraksi.destroy', $atraksi->id) }}" method="POST"
                                  class="flex-fill" onsubmit="return confirm('Yakin ingin menghapus {{ $atraksi->nama }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger w-100">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center empty-state">
                    <i class="bi bi-geo-alt"></i>
                    <p class="mb-0">Belum ada atraksi yang ditambahkan.</p>
                </div>
            </div>
        @endforelse
    </div>

</div>
@endsection