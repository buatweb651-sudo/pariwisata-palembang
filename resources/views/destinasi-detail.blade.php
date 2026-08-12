<?php 
    date_default_timezone_set("Asia/Jakarta");
?>

@extends('layouts.app')

@section('title', $destinasi->nama . '- Detail Destinasi')

@section('content')

<div class="container py-5">

    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('destinasi') }}">Destinasi</a></li>
           <li class="breadcrumb-item active" aria-current="page">
    {{ $destinasi->nama }}
</li>
        </ol>
    </nav>

    <div class="row g-4">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $destinasi->gambar) }}" class="img-fluid rounded shadow"
style="width:100%; height:430px; object-fit:cover;" alt="{{ $destinasi->nama }}">
        </div>

        

        <div class="col-md-6">
            @php
$jam = date('H:i:s');
$buka = $jam >= $destinasi->jam_buka && $jam < $destinasi->jam_tutup;
@endphp

<div class="d-flex align-items-center flex-wrap gap-2 mb-2">
    <span class="badge {{ $buka ? 'bg-success' : 'bg-danger' }}">
        {{ $buka ? 'Sedang Buka' : 'Sedang Tutup' }}
    </span>
    <span class="badge-harga-tiket">
        <i class="bi bi-ticket-perforated-fill"></i>
        {{ $destinasi->harga_tiket > 0 ? 'Rp ' . number_format($destinasi->harga_tiket, 0, ',', '.') . ' / orang' : 'Gratis' }}
    </span>
</div>
            <h1 class="mb-3">{{ $destinasi->nama }}</h1>

            <p class="lead">
                {{ $destinasi->deskripsi }}
            </p>

           <ul class="list-group list-group-flush mb-4">

    <li class="list-group-item">
        <i class="bi bi-clock"></i>
        <strong>Jam Operasional:</strong>
        {{ substr($destinasi->jam_buka,0,5) }} -
        {{ substr($destinasi->jam_tutup,0,5) }}
    </li>

    <li class="list-group-item">
        <i class="bi bi-geo-alt"></i>
        <strong>Lokasi:</strong>
        {{ $destinasi->lokasi }}
    </li>

</ul>




            <div class="d-flex gap-2">
                <a href="{{ route('destinasi') }}" class="btn-outline-tema">Kembali ke Destinasi</a>
                <a href="{{ route('kontak') }}#kontak" class="btn-tema">Hubungi Kami</a>
            </div>
        </div>
    </div>

    

    <div class="detail-atraksi mt-5">
    <h2 class="section-title">Atraksi di Destinasi Ini</h2>
    <div class="row g-4">
        @forelse ($destinasi->atraksi as $atraksi)
            <div class="col-md-4">
                <div class="atraksi-card h-100">
                    <div class="atraksi-img-wrap">
                        <img src="{{ asset('storage/' . $atraksi->gambar) }}" alt="{{ $atraksi->nama }}">
                        <span class="atraksi-badge-kategori">{{ ucfirst($atraksi->kategori) }}</span>
                    </div>
                    <div class="atraksi-body">
                        <h6 class="atraksi-title">{{ $atraksi->nama }}</h6>
                        <p class="atraksi-desc">{{ $atraksi->deskripsi }}</p>
                        <span class="atraksi-harga">
                            {{ $atraksi->harga > 0 ? 'Rp ' . number_format($atraksi->harga, 0, ',', '.') : 'Gratis' }}
                        </span>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada atraksi untuk destinasi ini.</p>
        @endforelse
    </div>
</div>

<div class="detail-ulasan mt-5">
    <span class="section-eyebrow">&#9670; Kata Pengunjung</span>
    <h2 class="section-title">Ulasan Pengunjung</h2>

    @forelse ($destinasi->ulasan as $ulasan)
        @if ($loop->first)
            <div class="row row-cols-1 row-cols-md-2 g-4 mt-1">
        @endif

        <div class="col">
            <div class="ulasan-card h-100">
                <i class="bi bi-quote ulasan-quote-icon"></i>
                <div class="d-flex align-items-center gap-3 mb-2">
                    <div class="ulasan-avatar">
                        {{ strtoupper(substr($ulasan->user->name, 0, 1)) }}
                    </div>
                    <div>
                        <strong class="d-block">{{ $ulasan->user->name }}</strong>
                        <div class="ulasan-stars">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="bi {{ $i <= $ulasan->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                            @endfor
                        </div>
                    </div>
                </div>
                <p class="ulasan-komentar mb-0">{{ $ulasan->komentar }}</p>
            </div>
        </div>

        @if ($loop->last)
            </div>
        @endif
    @empty
        <p class="text-muted">Belum ada ulasan untuk destinasi ini.</p>
    @endforelse

    <a href="{{ route('ulasan.create', $destinasi->id) }}" class="btn-tema mt-4">
        <i class="bi bi-pencil-square"></i> Tulis Ulasan
    </a>
</div>

    <div class="card fasilitas-card">
    <div class="card-body">
       <h5 class="card-title mb-4 text-center">Fasilitas Tersedia</h5>
        <div class="row row-cols-2 row-cols-md-4 g-3">
            <div class="col">
                <div class="fasilitas-item">
                    
                    <span>🅿️ Area Parkir</span>
                </div>
            </div>
            <div class="col">
                <div class="fasilitas-item">
                    
                    <span>🚻 Toilet Umum</span>
                </div>
            </div>
            <div class="col">
                <div class="fasilitas-item">
                    
                    <span>🏪 Warung/Kios</span>
                </div>
            </div>
            <div class="col">
                <div class="fasilitas-item">
                   <span>📸 Spot Foto</span>
                </div>
            </div>
        </div>
    </div>
</div>
   @if(Auth::check() && Auth::user()->role === 'admin')
    <div class="btn-hapus-wrapper d-flex justify-content-center gap-3">
        <a href="{{ route('destinasi.edit', $destinasi->id) }}" class="btn-outline-tema">
            <i class="bi bi-pencil-square"></i> Edit Destinasi
        </a>
        <form action="{{ route('destinasi.destroy', $destinasi->id) }}" method="POST"
              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-hapus">Hapus Destinasi</button>
        </form>
    </div>
    @endif

</div>

@endsection