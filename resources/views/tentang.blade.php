@extends('layouts.app')
@section('title', 'Wisata Palembang')
@section('content')

<section class="tentang-hero">
    <div class="container text-center">
        <h1>Tentang Kami</h1>
        <p>
            Selamat datang di Taman Bunga Nusantara, destinasi wisata yang menghadirkan keindahan taman tematik dengan beragam koleksi bunga dari berbagai penjuru dunia. Kami berkomitmen memberikan pengalaman wisata yang nyaman, edukatif, dan berkesan bagi setiap pengunjung.
        </p>
    </div>
</section>

<section class="tentang-kota">
    <div class="container">
        <div class="row align-items-center gy-4">
            <div class="col-md-6">
                <h2>Sekilas Tentang Palembang</h2>
                <p>
                    Palembang merupakan salah satu kota tertua di Indonesia yang memiliki sejarah panjang dan erat kaitannya dengan kejayaan Kerajaan Sriwijaya. Kota ini juga dikenal dengan Sungai Musi dan Jembatan Ampera yang menjadi ikon sekaligus daya tarik utama.
                </p>
                <p>
                    Selain sejarahnya, Palembang memiliki kekayaan budaya dan kuliner yang khas. Pempek, songket, rumah limas, serta berbagai tradisi lokal menjadi bagian dari identitas kota yang menarik untuk dikenali dan dijelajahi.
                </p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/plb4.jpg') }}" alt="Gambaran Kota Palembang" class="img-fluid tentang-img">
            </div>
        </div>
    </div>
</section>

<section class="tentang-keunggulan">
    <div class="container">
        <h2 class="text-center">Keunggulan Palembang</h2>
        <div class="row gy-4">
            <div class="col-md-3">
                <div class="keunggulan-card">
                    <h3>Sejarah & Budaya</h3>
                     <img src="{{ asset('images/plb5.jpg') }}" alt="Gambaran Rumah Limas Palembang" class="img-fluid tentang-img">
                    <p>Rumah Limas merupakan rumah tradisional khas Palembang yang mencerminkan kekayaan budaya dan kehidupan masyarakat Sumatera Selatan sejak dahulu.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="keunggulan-card">
                    <h3>Wisata Ikonik</h3>
                     <img src="{{ asset('images/plb6.jpg') }}" alt="Gambaran Sungai Musi" class="img-fluid tentang-img">
                    <p>Sungai Musi merupakan sungai yang menjadi ikon Kota Palembang dan memiliki peran penting dalam sejarah, kehidupan, serta perkembangan kota.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="keunggulan-card">
                    <h3>Kuliner Khas</h3>
                     <img src="{{ asset('images/plb7.jpg') }}" alt="Gambaran Pempek Palembang" class="img-fluid tentang-img">
                    <p>Pempek merupakan kuliner khas Palembang berbahan dasar ikan dan tepung sagu, disajikan dengan kuah cuko yang memiliki cita rasa gurih, manis, dan sedikit pedas.</p>
                </div>
            </div>
             <div class="col-md-3">
                <div class="keunggulan-card">
                    <h3>Kerajinan & Kesenian</h3>
                     <img src="{{ asset('images/plb8.jpg') }}" alt="Gambaran Kain Jumputan" class="img-fluid tentang-img">
                    <p>Kain Jumputan merupakan kain khas Palembang dengan motif dan warna yang dibuat melalui teknik ikat dan celup, menghasilkan corak unik yang menjadi bagian dari kerajinan tradisional daerah.</p>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="tentang-cta">
    <div class="container text-center">
        <h2>Yuk, Jelajahi Palembang Bersama Kami!</h2>
        <p>Temukan destinasi terbaik dan rencanakan perjalanan wisatamu mulai dari sekarang.</p>
        <a href="{{ route('destinasi') }}" class="btn-cta">Lihat Destinasi</a>
    </div>
</section>

@endsection