<?php
    $NamaDaerah = "Palembang";
    date_default_timezone_set("Asia/Jakarta");
?>

@extends('layouts.app')

@section('title', 'Palembang')

@section('content')

<section class="hero">

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
        @foreach ($destinasiList as $destinasi)
            <div class="kartu">
                <img src="{{ asset('images/' . $destinasi->gambar) }}" alt="{{ $destinasi->nama }}">
                <h3>{{ $destinasi->nama }}</h3>
                <p>{{ $destinasi->deskripsi }}</p>
                <p><strong>
                    @php $sekarang = date("H:i:s"); @endphp
                    {{ ($sekarang >= $destinasi->jam_buka && $sekarang <= $destinasi->jam_tutup) ? 'Buka' : 'Tutup' }}
                </strong></p>
                
            </div>
        @endforeach
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