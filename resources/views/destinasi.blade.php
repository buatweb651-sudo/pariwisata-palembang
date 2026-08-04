@extends('layouts.app')

@section('title', 'Destinasi - Palembang')

@section('content')

    <section class="destinasi-banner">
        <div class="container text-center">
            <h1 class="fw-bold">Destinasi Unggulan</h1>
        </div>
    </section>

    <section class="destinasi">
        <h2>Destinasi Unggulan</h2>
        <form action="{{ route('destinasi') }}" method="GET" class="mb-4">
    <div class="input-group">
        <input type="text" name="cari" class="form-control input-cari-tema"
               placeholder="Cari nama destinasi..." value="{{ $keyword ?? '' }}">
        <button type="submit" class="btn btn-cari-tema">Cari</button>
    </div>
</form>

        <div class="kartu-container">
            @forelse ($destinasiList as $destinasi)
                <?php
                    date_default_timezone_set("Asia/Jakarta");
                    $jamSekarang = date("H:i:s");
                    $bukaSekarang = ($jamSekarang >= $destinasi->jam_buka && $jamSekarang < $destinasi->jam_tutup);
                ?>
                <div class="kartu">
                    <img src="{{ asset('images/' . $destinasi->gambar) }}" alt="Foto {{ $destinasi->nama }}">
                    <h3>{{ $destinasi->nama }}</h3>
                    <p>{{ $destinasi->deskripsi }}</p>
                    <p><strong>{{ $bukaSekarang ? 'Buka' : 'Tutup' }}</strong></p>
                    <a href="{{ route('destinasi.detail', $destinasi->id) }}" class="btn btn-pink w-100 d-flex align-items-center justify-content-center gap-2">
                        Lihat Detail
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            @empty
                <p class="pesan-kosong">Belum ada destinasi tersedia.</p>
            @endforelse
        </div>
        <div class="d-flex justify-content-center mt-4 pagination-tema">
    {{ $destinasiList->appends(['cari' => $keyword])->links('pagination::bootstrap-5') }}
</div>

        
    </section>

    <section class="pengalaman-wisata">
        <div class="container text-center">
            <h2>Temukan Pengalamanmu</h2>
            <div class="pengalaman-container">

                <div class="pengalaman-card">
                    <img src="{{ asset('images/plb1 (2).jpg') }}" alt="Wisata Alam">
                    <div class="pengalaman-isi">
                        <h3>Wisata Alam</h3>
                        <p>Nikmati kesejukan taman, sungai, dan udara segar khas Palembang.</p>
                    </div>
                </div>

                <div class="pengalaman-card">
                    <img src="{{ asset('images/plb2 (2).webp') }}" alt="Wisata Sejarah">
                    <div class="pengalaman-isi">
                        <h3>Wisata Sejarah</h3>
                        <p>Telusuri jejak Kesultanan Palembang lewat benteng dan bangunan bersejarah.</p>
                    </div>
                </div>

                <div class="pengalaman-card">
                    <img src="{{ asset('images/plb3 (2).jpg') }}" alt="Kuliner">
                    <div class="pengalaman-isi">
                        <h3>Kuliner</h3>
                        <p>Cicipi pempek, tekwan, model, dan aneka kuliner khas Palembang.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection