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
            <li class="breadcrumb-item active" aria-current="page">Air Terjun Contoh</li>
        </ol>
    </nav>

    <div class="row g-4">
        <div class="col-md-6">
            <img src="{{ asset('images/' . $destinasi->gambar) }}" class="img-fluid rounded shadow-sm" alt="Air Terjun Contoh">
        </div>

        <div class="col-md-6">
            <span class="badge bg-success mb-2">Sedang Buka</span>
            <h1 class="mb-3">{{ $destinasi->nama }}</h1>

            <p class="lead">
                {{ $destinasi->deskripsi }}
            </p>

            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item">
                    <i class="bi bi-clock"></i> <strong>Jam Operasional:</strong> {{ $destinasi->jam_buka }}
                </li>
                <li class="list-group-item">
                    <i class="bi bi-clock"></i> <strong>Jam Operasional:</strong> {{ $destinasi->jam_tutup }}
                </li>
                <li class="list-group-item">
                    <i class="bi bi-geo-alt"></i> <strong>Lokasi:</strong> {{ $destinasi->lokasi }}
                </li>
            </ul>

            <div class="d-flex gap-2">
                <a href="{{ route('destinasi') }}" class="btn-outline-tema">Kembali ke Destinasi</a>
                <a href="{{ route('kontak') }}#kontak" class="btn-tema">Hubungi Kami</a>
            </div>
        </div>
    </div>

    <hr class="my-5">

    <div class="card fasilitas-card">
    <div class="card-body">
       <h5 class="card-title mb-4 text-center">Fasilitas Tersedia</h5>
        <div class="row row-cols-2 row-cols-md-4 g-3">
            <div class="col">
                <div class="fasilitas-item">
                    
                    <span>Area Parkir</span>
                </div>
            </div>
            <div class="col">
                <div class="fasilitas-item">
                    
                    <span>Toilet Umum</span>
                </div>
            </div>
            <div class="col">
                <div class="fasilitas-item">
                    
                    <span>Warung/Kios</span>
                </div>
            </div>
            <div class="col">
                <div class="fasilitas-item">
                   
                    <span>Spot Foto</span>
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