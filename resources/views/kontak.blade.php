@extends('layouts.app')
@section('title', 'Wisata Palembang')
@section('content')

<section class="kontak-hero">
    <div class="container text-center">
        <h1>Hubungi Kami</h1>
        <p>Ada pertanyaan seputar destinasi Palembang? Jangan ragu untuk menghubungi kami.</p>
    </div>
</section>

<section class="kontak-utama">
    <div class="container">
        <div class="row gy-5">

            <div class="col-lg-6">
                <h2>Kirim Pesan</h2>
                <form class="kontak-form">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama Anda">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email Anda">
                    </div>
                    <div class="mb-3">
                        <label for="subjek" class="form-label">Subjek <span class="opsional">(opsional)</span></label>
                        <input type="text" id="subjek" name="subjek" class="form-control" placeholder="Contoh: Tanya jadwal wisata">
                    </div>
                    <div class="mb-3">
                        <label for="pesan" class="form-label">Pesan</label>
                        <textarea id="pesan" name="pesan" rows="4" class="form-control" placeholder="Tulis pesan Anda"></textarea>
                    </div>
                    <button type="submit" class="btn-kirim">Kirim Pesan</button>
                </form>
            </div>

            <div class="col-lg-6">
                <h2>Informasi Kontak</h2>
                <ul class="info-list">
                    <li>
                        <strong>Alamat</strong>
                        <p>Jalan Sultan Mahmud Badaruddin II di kawasan 16 Ilir. </p>
                    </li>
                    <li>
                        <strong>Telepon / WhatsApp</strong>
                        <p>0260581677</p>
                    </li>
                    <li>
                        <strong>Email</strong>
                        <p> informasi@wisatapalembang.co.id.</p>
                    </li>
                    <li>
                        <strong>Website <span class="opsional">(opsional)</span></strong>
                        <p>www.wisatacontoh.com</p>
                    </li>
                </ul>

                <h3 class="mt-4">Media Sosial</h3>
<div class="sosial-list">
    <a href="https://www.instagram.com/tamanbunganusantara?igsh=MTJpY2ZycHowYWZyYw==" target="_blank" rel="noopener" aria-label="Instagram">
        <img src="{{ asset('images/ig.jpeg') }}" alt="Instagram">
    </a>
    <a href="https://www.facebook.com/share/1DLKN4c81D/" target="_blank" rel="noopener" aria-label="Facebook">
        <img src="{{ asset('images/fb.jpeg') }}" alt="Facebook">
    </a>
    <a href="https://www.tiktok.com/@tamanbunganusantara?_r=1&_t=ZS-98OsF1rbvQT" target="_blank" rel="noopener" aria-label="TikTok">
        <img src="{{ asset('images/tt.jpeg') }}" alt="TikTok">
    </a>
    <a href="https://youtube.com/@tamanbunganusantara1935?si=wXuVsCvn6vL3liO7="_blank" rel="noopener" aria-label="YouTube">
        <img src="{{ asset('images/yt.jpeg') }}" alt="YouTube">
    </a>
<a href="https://wa.me/6287738859933" target="_blank" rel="noopener" aria-label="WhatsApp">
    <img src="{{ asset('images/g wa.jpg') }}" alt="WhatsApp">
</a>
</div>

<h3 class="mt-4">Jam Operasional</h3>
                <table class="jam-table">
                    <tr>
                        <td>Senin - Jumat</td>
                        <td>09.00 - 16.00 WIB</td>
                    </tr>
                    <tr>
                        <td>Sabtu–Minggu & Libur Nasional (Weekend)</td>
                        <td>07.00 - 18.00 WIB</td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
</section>

<section class="kontak-peta">
    <div class="container">
        <h2 class="text-center">Lokasi Kami</h2>
        <div class="peta-wrapper">
            <iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1019963.0233432209!2d103.35191414606126!3d-3.0327084214227424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30713dc6afba7609%3A0x2636f733f17e95a0!2sSungai%20Musi!5e0!3m2!1sid!2sid!4v1785381042534!5m2!1sid!2sid"
    width="100%" height="350" style="border:0;" allowfullscreen=""
    loading="lazy" referrerpolicy="no-referrer-when-downgrade">
</iframe> width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>"
                width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

<section class="kontak-faq">
    <div class="container">
        <h2 class="text-center">Pertanyaan Umum (FAQ)</h2>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        Apakah perlu reservasi sebelum berkunjung?
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Untuk sebagian besar destinasi tidak wajib reservasi, namun untuk rombongan besar disarankan menghubungi kami terlebih dahulu.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        Bagaimana cara menghubungi tim kami dengan cepat?
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Silakan hubungi nomor WhatsApp yang tertera di halaman ini, tim kami biasanya membalas dalam jam operasional.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                        Apakah tersedia layanan di luar jam operasional?
                    </button>
                </h2>
                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Pesan tetap bisa dikirim lewat formulir di atas kapan saja, dan akan kami balas pada jam operasional berikutnya.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection