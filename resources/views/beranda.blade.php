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
    <h1><?php echo $Ucapan; ?>, Selamat Datang di <?php echo $NamaDaerah; ?></h1>
    <p>Nikmati pesona kota yang tumbuh bersama Sungai Musi, menyimpan jejak sejarah Sriwijaya, serta menghadirkan kekayaan budaya dan kuliner yang menjadi ciri khas Palembang.</p>
</section>

<section class="tentang">
    <h2>Tentang Daerah Kami</h2>
    <p>Palembang, Kota yang Penuh Cerita Palembang merupakan kota bersejarah di Sumatera Selatan yang identik dengan Sungai Musi, Jembatan Ampera, serta kekayaan kuliner dan budaya. Dari jejak kejayaan Sriwijaya hingga pesona wisata masa kini, Palembang menawarkan pengalaman yang menarik untuk dijelajahi.</p>
</section>

<section class="destinasi">
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