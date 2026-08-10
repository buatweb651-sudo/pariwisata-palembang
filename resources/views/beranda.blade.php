<?php
    $NamaDaerah = "Palembang";
    date_default_timezone_set("Asia/Jakarta");
?>

@extends('layouts.app')

@section('title', 'Palembang')

@section('content')

<section class="hero">
    <div class="hero-slider">
        <div class="hero-slide" style="background-image: url('{{ asset('images/hero10.jpg') }}');"></div>
        <div class="hero-slide" style="background-image: url('{{ asset('images/hero20.jpg') }}');"></div>
        <div class="hero-slide" style="background-image: url('{{ asset('images/hero30.jpg') }}');"></div>
    </div>

    <?php
    $JamSekarang = date("H:i");

    if ($JamSekarang < 10) {
        $Ucapan = "Selamat Pagi";
    } elseif ($JamSekarang < 15) {
        $Ucapan = "Selamat Siang";
    } elseif ($JamSekarang < 18) {
        $Ucapan = "Selamat Sore";
    } else {
        $Ucapan = "Selamat Malam";
    }
    ?>

    <div class="hero-content">

        <span class="hero-badge">
            ✨ Jelajahi Pesona Kota Palembang
        </span>

        <h1>
            {{ $Ucapan }}, Selamat Datang di {{ $NamaDaerah }}
        </h1>

        <p>
            Nikmati pesona Sungai Musi, kemegahan Jembatan Ampera,
            wisata sejarah Sriwijaya, serta kuliner legendaris yang
            menjadi kebanggaan Kota Palembang.
        </p>

        <a href="{{ route('destinasi') }}" class="hero-button">
            Jelajahi Destinasi
        </a>

    </div>

</section>



<section class="statistik">
    <div class="container">
        <div class="row text-center">

            <div class="col-md-4 mb-4">
                <div class="stat-box">
                  <h2>73+</h2>
                    <p>Destinasi Wisata</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="stat-box">
                    <h2>150+</h2>
                    <p>Atraksi Menarik</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="stat-box">
                    <h2>2M+</h2>
                    <p>Pengunjung</p>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="destinasi" id="destinasi">
    <h2>Destinasi Unggulan</h2>
   <div class="kartu-container">
    @foreach ($destinasiList->take(3) as $destinasi)
        <div class="kartu">
            <img src="{{ asset('storage/' . $destinasi->gambar) }}" alt="{{ $destinasi->nama }}">
            <h3>{{ $destinasi->nama }}</h3>
            <p>{{ $destinasi->deskripsi }}</p>
        </div>
    @endforeach
</div>
</section>

<section class="info-terbaru">
    <div class="container">
        <h2 class="text-center">Info & Event Terbaru</h2>
        <p class="text-center sub-judul">Ikuti kabar dan agenda wisata terkini seputar Kota Palembang.</p>

        <div class="row gy-4 mt-3">
            <div class="col-md-4">
                <div class="info-card">
                   <img src="{{ asset('images/hero100.webp') }}" alt="Festival Sriwijaya">
                    <div class="info-card-body">
                        <span class="info-tanggal">15 Agustus 2026</span>
                        <h3>Festival Sriwijaya 2026</h3>
                        <p>Perayaan tahunan yang menampilkan pertunjukan budaya, kuliner khas, dan pameran kerajinan tradisional Palembang.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card">
                    <img src="{{ asset('images/hero200.jpeg') }}" alt="Lomba Perahu Bidar">
                    <div class="info-card-body">
                        <span class="info-tanggal">17 Agustus 2026</span>
                        <h3>Lomba Perahu Bidar Sungai Musi</h3>
                        <p>Perlombaan tradisional dayung perahu bidar yang digelar di Sungai Musi dalam rangka HUT Kemerdekaan RI.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card">
                   <img src="{{ asset('images/hero300.jpeg') }}" alt="Jam Operasional Baru">
                    <div class="info-card-body">
                        <span class="info-tanggal">1 Agustus 2026</span>
                        <h3> Ziarah Kubro di Palembang</h3>
                        <p>Mulai bulan ini, jam kunjungan Pulau Kemaro diperpanjang hingga pukul 18.00 WIB setiap hari.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="kontak">
    <h2>Hubungi Kami</h2>
    <form>
        <div>
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Masukkan email Anda">
        </div>
        <div>
            <label for="pesan">Pesan</label>
            <textarea id="pesan" name="pesan" rows="4" placeholder="Tulis pesan Anda"></textarea>
        </div>
        <button type="submit">Kirim Pesan</button>
    </form>
</section>

@endsection