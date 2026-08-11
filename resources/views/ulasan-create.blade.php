@extends('layouts.app')

@section('title', 'Tulis Ulasan - ' . $destinasi->nama)

@section('content')
<div class="container my-5">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('destinasi.detail', $destinasi->id) }}">{{ $destinasi->nama }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tulis Ulasan</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <h2 class="card-title mb-4">Tulis Ulasan untuk {{ $destinasi->nama }}</h2>

                    <form action="{{ route('ulasan.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="destinasi_id" value="{{ $destinasi->id }}">

                        <div class="mb-3">
                            <label class="form-label">Menulis sebagai</label>
                            @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Rating</label>
                            <select name="rating" class="form-select @error('rating') is-invalid @enderror">
                                <option value="" selected disabled>-- Pilih Rating --</option>
                                <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>5 - Sangat Bagus</option>
                                <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>4 - Bagus</option>
                                <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>3 - Cukup</option>
                                <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>2 - Kurang</option>
                                <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>1 - Buruk</option>
                            </select>
                            @error('rating')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Komentar</label>
                            <textarea name="komentar" class="form-control @error('komentar') is-invalid @enderror"
                                      rows="4">{{ old('komentar') }}</textarea>
                            @error('komentar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
                            <a href="{{ route('destinasi.detail', $destinasi->id) }}" class="btn btn-outline-secondary">Batal</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection