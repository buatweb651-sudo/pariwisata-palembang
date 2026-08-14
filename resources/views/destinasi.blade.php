@extends('layouts.app')

@section('title', 'Destinasi - Palembang')

@section('content')

   <section class="destinasi-banner" style="background-image: url('{{ asset('images/herol.jpg') }}');">
    <div class="container text-center">

        <span class="banner-badge">
            📍 Jelajahi Kota Palembang
        </span>

        <h1 class="fw-bold">
            Temukan Destinasi <br>
            Terbaik di Palembang
        </h1>

        <p>
            Dari wisata sejarah, budaya, kuliner,
            hingga panorama Sungai Musi,
            semuanya siap menemani perjalananmu.
        </p>

        <a href="#daftar-destinasi" class="btn-hero">
                Jelajahi Destinasi
        </a>

    </div>
</section>

   <section class="destinasi" id="daftar-destinasi">
        <div class="text-center mb-2">
    <h2 class="mb-0">Daftar Destinasi</h2>
    @if(Auth::check() && Auth::user()->role === 'admin')
        <a href="{{ route('destinasi.create') }}" class="btn-tema mt-3 d-inline-block">
            <i class="bi bi-plus-lg"></i> Tambah Destinasi
        </a>
    @endif
</div>

<p class="sub-judul text-center">
Cari dan temukan destinasi wisata terbaik di Kota Palembang.
</p>
    <form action="{{ route('destinasi') }}" method="GET" class="mb-5 mx-auto" style="max-width: 600px;">
<div class="input-group">
    <input type="text" name="cari" class="form-control input-cari-tema"
           placeholder="Cari nama destinasi..." value="{{ $keyword ?? '' }}">
    <button type="submit" class="btn btn-cari-tema">Cari</button>
</div>
</form>

<div class="filter-kategori-wrap mb-4 justify-content-center">
    <a href="{{ route('destinasi', array_filter(['cari' => $keyword])) }}"
       class="btn-kategori-pill {{ !$kategoriId ? 'aktif' : '' }}">
        Semua
    </a>
    @foreach ($kategoriList as $kategori)
        <a href="{{ route('destinasi', array_filter(['cari' => $keyword, 'kategori' => $kategori->id])) }}"
           class="btn-kategori-pill {{ $kategoriId == $kategori->id ? 'aktif' : '' }}">
            {{ $kategori->nama_kategori }}
        </a>
    @endforeach
</div>


        <div class="kartu-container">
            @forelse ($destinasiList as $destinasi)
                <?php
                    date_default_timezone_set("Asia/Jakarta");
                    $jamSekarang = date("H:i:s");
                    $bukaSekarang = ($jamSekarang >= $destinasi->jam_buka && $jamSekarang < $destinasi->jam_tutup);
                ?>
                <div class="kartu">
                <div class="kartu-img-wrap">
                 <img src="{{ asset('storage/' . $destinasi->gambar) }}" alt="Foto {{ $destinasi->nama }}">
              </div>
                 <h3>{{ $destinasi->nama }}</h3>

@if($destinasi->kategoriData)
    <span class="badge bg-secondary">
        {{ $destinasi->kategoriData->nama_kategori }}
    </span>
@endif

<p>{{ $destinasi->deskripsi }}</p>
                  @if($bukaSekarang)
                  
                <span class="status-buka">🟢 Buka</span>
            @else
    <span class="status-tutup">🔴 Tutup</span>
@endif
                    <a href="{{ route('destinasi.detail', $destinasi->id) }}" class="btn btn-pink w-100 d-flex align-items-center justify-content-center gap-2">
                        Lihat Detail
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
           @empty
    <div class="empty-state">
        <div class="empty-icon">🔍</div>
        <p class="pesan-kosong">Yah, destinasi "{{ $keyword }}" tidak ditemukan.</p>
        <a href="{{ route('destinasi') }}" class="btn-reset-filter">Lihat Semua Destinasi</a>
    </div>
@endforelse
        </div>
       <div class="d-flex justify-content-center mt-4 pagination-tema">
    {{ $destinasiList->appends(['cari' => $keyword])->links('pagination::bootstrap-5') }}
</div>

    </section>

    <section class="kenapa-wisata py-5">
        <div class="container">
            <div class="text-center mb-5">
                <p class="section-eyebrow">Kenapa Palembang?</p>
                <h2 class="section-title">Alasan Wajib Berkunjung ke Palembang</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-3 col-6">
                    <div class="kenapa-card text-center p-4">
                        <div class="kenapa-icon mb-3">🏛️</div>
                        <h5>Kaya Sejarah</h5>
                        <p class="mb-0">Jejak Kerajaan Sriwijaya masih terasa di setiap sudut kota, dari museum hingga situs bersejarah.</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="kenapa-card text-center p-4">
                        <div class="kenapa-icon mb-3">🍜</div>
                        <h5>Surga Kuliner</h5>
                        <p class="mb-0">Pempek, tekwan, dan mie celor jadi alasan wajib untuk singgah dan mencicipi.</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="kenapa-card text-center p-4">
                        <div class="kenapa-icon mb-3">🌊</div>
                        <h5>Ikon Sungai Musi</h5>
                        <p class="mb-0">Jembatan Ampera dan panorama sungai jadi latar yang tak terlupakan.</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="kenapa-card text-center p-4">
                        <div class="kenapa-icon mb-3">🛍️</div>
                        <h5>Belanja Khas</h5>
                        <p class="mb-0">Songket dan oleh-oleh tradisional siap dibawa pulang sebagai kenang-kenangan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection