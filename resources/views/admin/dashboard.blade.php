@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

{{-- =========================
     WELCOME
========================= --}}
<div class="welcome-card mb-4">
    <div>
        <h4>Selamat datang kembali, Admin! 👋</h4>
        <p>
            Kelola seluruh data wisata melalui panel admin dengan mudah.
        </p>
    </div>
</div>


{{-- =========================
     STATISTIK
========================= --}}
<div class="row g-3 mb-4">

    {{-- Total Destinasi --}}
    <div class="col-md-6 col-xl-3">
        <div class="card border-0 shadow-sm stat-card h-100">
            <div class="card-body d-flex align-items-center gap-3">

                <div class="stat-icon icon-gold">
                    <i class="bi bi-geo-alt-fill"></i>
                </div>

                <div>
                    <div class="text-muted small">Total Destinasi</div>
                    <div class="stat-number">{{ $totalDestinasi }}</div>
                    <div class="stat-label">Destinasi tersedia</div>
                </div>

            </div>
        </div>
    </div>


    {{-- Total Atraksi --}}
    <div class="col-md-6 col-xl-3">
        <div class="card border-0 shadow-sm stat-card h-100">
            <div class="card-body d-flex align-items-center gap-3">

                <div class="stat-icon icon-maroon">
                    <i class="bi bi-stars"></i>
                </div>

                <div>
                    <div class="text-muted small">Total Atraksi</div>
                    <div class="stat-number">{{ $totalAtraksi }}</div>
                    <div class="stat-label">Atraksi tersedia</div>
                </div>

            </div>
        </div>
    </div>


    {{-- Total User --}}
    <div class="col-md-6 col-xl-3">
        <div class="card border-0 shadow-sm stat-card h-100">
            <div class="card-body d-flex align-items-center gap-3">

                <div class="stat-icon icon-gold">
                    <i class="bi bi-people-fill"></i>
                </div>

                <div>
                    <div class="text-muted small">Total User</div>
                    <div class="stat-number">{{ $totalUser }}</div>
                    <div class="stat-label">User terdaftar</div>
                </div>

            </div>
        </div>
    </div>


    {{-- Total Ulasan --}}
    <div class="col-md-6 col-xl-3">
        <div class="card border-0 shadow-sm stat-card h-100">
            <div class="card-body d-flex align-items-center gap-3">

                <div class="stat-icon icon-maroon">
                    <i class="bi bi-chat-square-text-fill"></i>
                </div>

                <div>
                    <div class="text-muted small">Total Ulasan</div>
                    <div class="stat-number">{{ $totalUlasan }}</div>
                    <div class="stat-label">Ulasan masuk</div>
                </div>

            </div>
        </div>
    </div>

</div>


{{-- =========================
     AKTIVITAS + AKSI CEPAT
========================= --}}
<div class="row g-4 mb-4">

    {{-- Aktivitas Terbaru --}}
    <div class="col-lg-7">

        <div class="dashboard-card h-100">

            <div class="card-header-custom">
                <div>
                    <h5>
                        <i class="bi bi-clock-history"></i>
                        Aktivitas Terbaru
                    </h5>
                    <p>Aktivitas terbaru pada sistem</p>
                </div>

                <span class="small-link">
                    Lihat Semua
                    <i class="bi bi-arrow-right"></i>
                </span>
            </div>


            <div class="activity-list">

                <div class="activity-item">
                    <div class="activity-icon icon-gold">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>

                    <div class="activity-content">
                        <strong>Destinasi baru ditambahkan</strong>
                        <span>Data destinasi berhasil ditambahkan ke sistem</span>
                    </div>

                    <div class="activity-time">
                        Baru saja
                    </div>
                </div>


                <div class="activity-item">
                    <div class="activity-icon icon-maroon">
                        <i class="bi bi-stars"></i>
                    </div>

                    <div class="activity-content">
                        <strong>Atraksi baru ditambahkan</strong>
                        <span>Data atraksi berhasil ditambahkan ke sistem</span>
                    </div>

                    <div class="activity-time">
                        30 menit lalu
                    </div>
                </div>


                <div class="activity-item">
                    <div class="activity-icon icon-gold">
                        <i class="bi bi-person-plus-fill"></i>
                    </div>

                    <div class="activity-content">
                        <strong>User baru mendaftar</strong>
                        <span>User baru telah terdaftar pada website</span>
                    </div>

                    <div class="activity-time">
                        1 jam lalu
                    </div>
                </div>


                <div class="activity-item">
                    <div class="activity-icon icon-maroon">
                        <i class="bi bi-chat-square-text-fill"></i>
                    </div>

                    <div class="activity-content">
                        <strong>Ulasan baru masuk</strong>
                        <span>Terdapat ulasan baru dari pengguna</span>
                    </div>

                    <div class="activity-time">
                        2 jam lalu
                    </div>
                </div>

            </div>

        </div>

    </div>


    {{-- Aksi Cepat --}}
    <div class="col-lg-5">

        <div class="dashboard-card h-100">

            <div class="card-header-custom">
                <div>
                    <h5>
                        <i class="bi bi-lightning-charge-fill"></i>
                        Aksi Cepat
                    </h5>
                    <p>Akses menu yang sering digunakan</p>
                </div>
            </div>


            <div class="quick-actions">

                <a href="{{ route('destinasi') }}" class="quick-action action-gold">
                    <div class="quick-icon">
                        <i class="bi bi-plus-lg"></i>
                    </div>

                    <div>
                        <strong>Tambah / Kelola Destinasi</strong>
                        <span>Kelola data destinasi wisata</span>
                    </div>

                    <i class="bi bi-chevron-right arrow"></i>
                </a>


                <a href="{{ route('atraksi') }}" class="quick-action action-maroon">
                    <div class="quick-icon">
                        <i class="bi bi-plus-lg"></i>
                    </div>

                    <div>
                        <strong>Tambah / Kelola Atraksi</strong>
                        <span>Kelola data atraksi wisata</span>
                    </div>

                    <i class="bi bi-chevron-right arrow"></i>
                </a>


                <a href="{{ route('user.index') }}" class="quick-action action-green">
                    <div class="quick-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <div>
                        <strong>Kelola User</strong>
                        <span>Lihat dan kelola pengguna</span>
                    </div>

                    <i class="bi bi-chevron-right arrow"></i>
                </a>

            </div>

     </div>

    </div>

</div>


{{-- =========================
     GRAFIK PERTUMBUHAN USER
========================= --}}
<div class="dashboard-card mb-4">

    <div class="card-header-custom">
        <div>
            <h5>
                <i class="bi bi-graph-up-arrow"></i>
                Pertumbuhan User
            </h5>
            <p>Jumlah user baru 7 hari terakhir</p>
        </div>
    </div>

    <div style="padding: 1.25rem; position: relative; height: 280px;">
        <canvas id="userGrowthChart"></canvas>
    </div>

</div>


{{-- =========================
     DESTINASI TERPOPULER + ULASAN TERBARU
========================= --}}
<div class="row g-4 mb-4">

    <div class="col-lg-7">
    <div class="dashboard-card h-100">  

    <div class="card-header-custom">
        <div>
            <h5>
                <i class="bi bi-star-fill"></i>
                Destinasi Terpopuler
            </h5>

            <p>Destinasi yang paling banyak diminati</p>
        </div>

        <a href="{{ route('destinasi') }}" class="small-link">
            Lihat Semua
            <i class="bi bi-arrow-right"></i>
        </a>
    </div>


    <div class="popular-list">

        <div class="popular-item">
            <div class="rank rank-one">1</div>

            <div class="popular-content">
                <strong>Pulau Kemaro</strong>
                <span>Destinasi wisata Palembang</span>
            </div>

            <div class="rating">
                <i class="bi bi-star-fill"></i>
                4.8
            </div>
        </div>


        <div class="popular-item">
            <div class="rank rank-two">2</div>

            <div class="popular-content">
                <strong>Benteng Kuto Besak</strong>
                <span>Destinasi sejarah Palembang</span>
            </div>

            <div class="rating">
                <i class="bi bi-star-fill"></i>
                4.7
            </div>
        </div>


       <div class="popular-item">
            <div class="rank rank-three">3</div>

            <div class="popular-content">
                <strong>Sentra Kuliner Palembang</strong>
                <span>Wisata kuliner khas Palembang</span>
            </div>

            <div class="rating">
                <i class="bi bi-star-fill"></i>
                4.6
            </div>
        </div>

    </div>

    </div>
    </div>


    <div class="col-lg-5">
    <div class="dashboard-card h-100">

        <div class="card-header-custom">
            <div>
                <h5>
                    <i class="bi bi-chat-square-text-fill"></i>
                    Ulasan Terbaru
                </h5>
                <p>Ulasan terbaru dari pengguna</p>
            </div>
        </div>

        <div class="review-list">
            @forelse ($ulasanTerbaru as $ulasan)
                <div class="review-item">
                    <div class="review-stars">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="bi bi-star-fill{{ $i > $ulasan->rating ? ' star-empty' : '' }}"></i>
                        @endfor
                    </div>
                    <p class="review-text">"{{ $ulasan->komentar }}"</p>
                    <div class="review-meta">
                        — {{ $ulasan->user->name ?? 'Pengguna' }} · {{ $ulasan->destinasi->nama ?? '-' }}
                    </div>
                </div>
            @empty
                <p class="text-muted small px-3 py-3 mb-0">Belum ada ulasan masuk.</p>
            @endforelse
        </div>

    </div>
    </div>

</div>


@if ($destinasiPerluPerhatian->count() > 0)
{{-- =========================
     DESTINASI PERLU DIPERHATIKAN
========================= --}}
<div class="dashboard-card mb-4">

    <div class="card-header-custom">
        <div>
            <h5>
                <i class="bi bi-exclamation-triangle-fill"></i>
                Perlu Diperhatikan
            </h5>
            <p>Destinasi dengan data belum lengkap</p>
        </div>
    </div>

    <div class="attention-list">
        @foreach ($destinasiPerluPerhatian as $destinasi)
            <div class="attention-item">
                <i class="bi bi-exclamation-circle"></i>
                <div>
                    <strong>{{ $destinasi->nama }}</strong>
                    <span>
                        @if (empty($destinasi->gambar)) Belum ada foto. @endif
                        @if (empty($destinasi->harga_tiket)) Harga tiket belum diisi. @endif
                    </span>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endif


<style>

/* =========================
   WELCOME
========================= */

.welcome-card {
    background: linear-gradient(
        135deg,
        #fffdf8,
        #fdf6e3
    );

    border: 1px solid #eee0c4;
    border-radius: 16px;
    padding: 1.35rem 1.5rem;
}

.welcome-card h4 {
    color: #7A1E1E;
    font-size: 1.2rem;
    font-weight: 700;
    margin-bottom: 0.35rem;
}

.welcome-card p {
    color: #777;
    margin: 0;
    font-size: 0.9rem;
}


/* =========================
   STAT CARD
========================= */

.stat-card {
    border-radius: 14px;
    transition: all 0.2s ease;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 20px rgba(122, 30, 30, 0.1) !important;
}

.stat-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 1.35rem;
    flex-shrink: 0;
}

.icon-gold {
    background: #fdf6e3;
    color: #C9A227;
}

.icon-maroon {
    background: #fbeaea;
    color: #7A1E1E;
}

.icon-green {
    background: #edf7ed;
    color: #4f8a4f;
}

.stat-number {
    color: #7A1E1E;
    font-size: 1.7rem;
    font-weight: 700;
    line-height: 1.2;
}

.stat-label {
    color: #999;
    font-size: 0.72rem;
    margin-top: 2px;
}


/* =========================
   DASHBOARD CARD
========================= */

.dashboard-card {
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
    border: 1px solid #eee9df;
    overflow: hidden;
}

.card-header-custom {
    padding: 1.15rem 1.25rem;
    border-bottom: 1px solid #f0ece5;

    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-header-custom h5 {
    color: #7A1E1E;
    font-size: 1rem;
    font-weight: 700;
    margin: 0;
}

.card-header-custom h5 i {
    margin-right: 6px;
}

.card-header-custom p {
    color: #999;
    font-size: 0.75rem;
    margin: 4px 0 0;
}

.small-link {
    color: #7A1E1E;
    font-size: 0.75rem;
    font-weight: 600;
    text-decoration: none;
}

.small-link:hover {
    color: #C9A227;
}


/* =========================
   AKTIVITAS
========================= */

.activity-list {
    padding: 0 1.25rem;
}

.activity-item {
    display: flex;
    align-items: center;
    gap: 12px;

    padding: 1rem 0;

    border-bottom: 1px solid #f1eee8;
}

.activity-item:last-child {
    border-bottom: none;
}

.activity-icon {
    width: 38px;
    height: 38px;
    border-radius: 10px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;
}

.activity-content {
    flex: 1;
    min-width: 0;
}

.activity-content strong {
    display: block;
    color: #333;
    font-size: 0.82rem;
    font-weight: 600;
}

.activity-content span {
    display: block;
    color: #999;
    font-size: 0.7rem;
    margin-top: 2px;
}

.activity-time {
    color: #aaa;
    font-size: 0.68rem;
    white-space: nowrap;
}


/* =========================
   AKSI CEPAT
========================= */

.quick-actions {
    padding: 1.1rem 1.25rem;
}

.quick-action {
    display: flex;
    align-items: center;
    gap: 12px;

    padding: 0.85rem;

    border-radius: 11px;
    margin-bottom: 0.7rem;

    text-decoration: none;

    transition: all 0.2s ease;
}

.quick-action:last-child {
    margin-bottom: 0;
}

.quick-action:hover {
    transform: translateX(4px);
}

.quick-icon {
    width: 38px;
    height: 38px;
    border-radius: 10px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;
}

.quick-action strong {
    display: block;
    font-size: 0.8rem;
}

.quick-action span {
    display: block;
    font-size: 0.68rem;
    margin-top: 2px;
}

.quick-action .arrow {
    margin-left: auto;
    font-size: 0.8rem;
}

.action-gold {
    background: #fffaf0;
    border: 1px solid #f1dfaa;
    color: #7A1E1E;
}

.action-gold .quick-icon {
    background: #fdf0c9;
    color: #C9A227;
}

.action-maroon {
    background: #fff5f5;
    border: 1px solid #f1d7d7;
    color: #7A1E1E;
}

.action-maroon .quick-icon {
    background: #fbeaea;
    color: #7A1E1E;
}

.action-green {
    background: #f5fbf5;
    border: 1px solid #d7ead7;
    color: #477347;
}

.action-green .quick-icon {
    background: #e5f3e5;
    color: #4f8a4f;
}


/* =========================
   DESTINASI TERPOPULER
========================= */

.popular-list {
    padding: 0 1.25rem;
}

.popular-item {
    display: flex;
    align-items: center;
    gap: 13px;

    padding: 0.95rem 0;

    border-bottom: 1px solid #f1eee8;
}

.popular-item:last-child {
    border-bottom: none;
}

.rank {
    width: 32px;
    height: 32px;

    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 0.78rem;
    font-weight: 700;

    flex-shrink: 0;
}

.rank-one {
    background: #fdf0c9;
    color: #C9A227;
}

.rank-two {
    background: #eeeeee;
    color: #777;
}

.rank-three {
    background: #f6e8d6;
    color: #a87532;
}

.popular-content {
    flex: 1;
}

.popular-content strong {
    display: block;
    color: #333;
    font-size: 0.83rem;
}

.popular-content span {
    display: block;
    color: #999;
    font-size: 0.7rem;
    margin-top: 2px;
}

.rating {
    color: #C9A227;
    font-size: 0.8rem;
    font-weight: 600;
}

.rating i {
    font-size: 0.72rem;
}


/* =========================
   RESPONSIVE
========================= */

/* =========================
   GRAFIK
========================= */

#userGrowthChart {
    max-height: 260px;
}


/* =========================
   ULASAN TERBARU
========================= */

.review-list {
    padding: 0.5rem 1.25rem 1.25rem;
}

.review-item {
    padding: 0.85rem 0;
    border-bottom: 1px solid #f1eee8;
}

.review-item:last-child {
    border-bottom: none;
}

.review-stars {
    color: #C9A227;
    font-size: 0.8rem;
    margin-bottom: 4px;
}

.review-stars .star-empty {
    color: #e5e0d3;
}

.review-text {
    color: #555;
    font-size: 0.82rem;
    font-style: italic;
    margin: 0 0 4px;
}

.review-meta {
    color: #999;
    font-size: 0.72rem;
}


/* =========================
   PERLU DIPERHATIKAN
========================= */

.attention-list {
    padding: 0.5rem 1.25rem 1.25rem;
}

.attention-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;

    padding: 0.75rem 0;
    border-bottom: 1px solid #f1eee8;
}

.attention-item:last-child {
    border-bottom: none;
}

.attention-item i {
    color: #C9A227;
    font-size: 1rem;
    margin-top: 2px;
}

.attention-item strong {
    display: block;
    color: #333;
    font-size: 0.82rem;
}

.attention-item span {
    display: block;
    color: #999;
    font-size: 0.72rem;
    margin-top: 2px;
}


/* =========================
   RESPONSIVE
========================= */

@media (max-width: 768px) {

    .welcome-card {
        padding: 1.1rem;
    }

    .card-header-custom {
        align-items: flex-start;
        gap: 10px;
    }

    .activity-item {
        align-items: flex-start;
    }

    .activity-time {
        display: none;
    }

}

</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    const ctxUserGrowth = document.getElementById('userGrowthChart');

    new Chart(ctxUserGrowth, {
        type: 'line',
        data: {
            labels: @json($userGrowthLabels),
            datasets: [{
                label: 'User Baru',
                data: @json($userGrowthData),
                borderColor: '#7A1E1E',
                backgroundColor: 'rgba(122, 30, 30, 0.08)',
                tension: 0.35,
                fill: true,
                pointBackgroundColor: '#C9A227',
                pointRadius: 4,
            }]
        },
       options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 }
                }
            }
        }
    });
</script>

@endsection