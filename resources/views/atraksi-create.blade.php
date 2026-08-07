@extends('layouts.app')

@section('title', 'Tambah Atraksi')

@section('content')
<div class="pb-wrapper">
    <div class="container">

        {{-- ============ BREADCRUMB ============ --}}
        <nav aria-label="breadcrumb" class="pb-breadcrumb">
            <a href="{{ route('beranda') }}"><i class="fa-solid fa-house"></i> Beranda</a>
            <span class="pb-sep">/</span>
            <a href="{{ route('atraksi') }}">Atraksi</a>
            <span class="pb-sep">/</span>
            <span class="pb-current">Tambah Atraksi</span>
        </nav>

        <div class="row justify-content-center g-4">
            <div class="col-lg-7">

                {{-- ============ FORM CARD ============ --}}
                <div class="pb-card">
                    <div class="pb-card-header">
                        
                        <div>
                            <h2>Tambah Atraksi Baru</h2>
                            <p>Lengkapi informasi atraksi wisata Palembang</p>
                        </div>
                    </div>

                    <div class="pb-card-body">

                        @if ($errors->any())
                            <div class="pb-alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                Periksa kembali isian di bawah ini.
                            </div>
                        @endif

                        <form action="{{ route('atraksi.store') }}" method="POST" class="pb-form">
                            @csrf

                            <select name="destinasi_id" class="form-select @error('destinasi_id') is-invalid @enderror">
                             <option value="" selected disabled>-- Pilih Destinasi --</option>
                        @foreach ($destinasiList as $destinasi)
                               <option value="{{ $destinasi->id }}"
                                      {{ old('destinasi_id') == $destinasi->id ? 'selected' : '' }}>
                                {{ $destinasi->nama }}
                             </option>
                     @endforeach
                            </select>


                            <div class="pb-group">
                                <label for="nama"><i class="fa-solid fa-tag"></i> Nama Atraksi</label>
                                <input type="text" id="nama" name="nama"
                                       class="pb-input @error('nama') is-invalid @enderror"
                                       value="{{ old('nama') }}"
                                       placeholder="Contoh: Sentra Kuliner Palembang">
                                @error('nama')
                                    <div class="pb-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="pb-group">
                                <label for="deskripsi"><i class="fa-solid fa-align-left"></i> Deskripsi</label>
                                <textarea id="deskripsi" name="deskripsi" rows="4"
                                          class="pb-input @error('deskripsi') is-invalid @enderror"
                                          placeholder="Ceritakan tentang atraksi ini...">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <div class="pb-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="pb-group">
                                        <label for="kategori"><i class="fa-solid fa-bookmark"></i> Kategori</label>
                                        <select id="kategori" name="kategori"
                                                class="pb-input pb-select @error('kategori') is-invalid @enderror">
                                            <option value="" selected disabled>-- Pilih Kategori --</option>
                                            <option value="Budaya" {{ old('kategori') == 'Budaya' ? 'selected' : '' }}>Budaya</option>
                                            <option value="Alam" {{ old('kategori') == 'Alam' ? 'selected' : '' }}>Alam</option>
                                            <option value="Kuliner" {{ old('kategori') == 'Kuliner' ? 'selected' : '' }}>Kuliner</option>
                                        </select>
                                        @error('kategori')
                                            <div class="pb-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="pb-group">
                                        <label for="harga"><i class="fa-solid fa-coins"></i> Harga (Rp)</label>
                                        <input type="number" id="harga" name="harga"
                                               class="pb-input @error('harga') is-invalid @enderror"
                                               value="{{ old('harga') }}"
                                               placeholder="0">
                                        <div class="pb-hint">Isi 0 kalau gratis.</div>
                                        @error('harga')
                                            <div class="pb-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="pb-group">
                                <label for="gambar"><i class="fa-solid fa-image"></i> Nama File Gambar</label>
                                <input type="text" id="gambar" name="gambar"
                                       class="pb-input @error('gambar') is-invalid @enderror"
                                       value="{{ old('gambar') }}"
                                       placeholder="contoh: tari-zapin.jpg">
                                @error('gambar')
                                    <div class="pb-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr class="pb-divider">

                           <hr class="pb-divider">

<div class="pb-actions">
    <button type="submit" class="pb-btn-save">
        <i class="fa-solid fa-check"></i>
        Simpan Atraksi
    </button>

    <a href="{{ route('atraksi') }}" class="pb-btn-cancel">
        <i class="fa-solid fa-xmark"></i>
        Batal
    </a>
</div>

</form>

</div> {{-- pb-card-body --}}
</div> {{-- pb-card --}}

</div> {{-- col-lg-7 --}}
</div> {{-- row --}}

</div> {{-- container --}}
</div> {{-- pb-wrapper --}}
@endsection