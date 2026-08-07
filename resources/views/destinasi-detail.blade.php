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
            <img src="{{ asset('images/' . $destinasi->gambar) }}" class="img-fluid rounded shadow"
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
    <div class="row g-3">
        @forelse ($destinasi->atraksi as $atraksi)
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="{{ asset('images/' . $atraksi->gambar) }}" class="card-img-top">
                    <div class="card-body">
                        <h6 class="card-title">{{ $atraksi->nama }}</h6>
                        <span class="badge bg-secondary">{{ $atraksi->kategori }}</span>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada atraksi untuk destinasi ini.</p>
        @endforelse
    </div>
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
    <div class="btn-hapus-wrapper">
        <form action="{{ route('destinasi.destroy', $destinasi->id) }}" method="POST"
              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-hapus">Hapus Destinasi</button>
        </form>
    </div>

</div>

@endsection