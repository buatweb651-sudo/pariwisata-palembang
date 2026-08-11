@extends('layouts.app')

@section('content')
<div class="pb-wrapper">
    <div class="container" style="max-width:800px;">

        <div class="pb-card">
            <div class="pb-card-header">
                <span class="pb-icon"><i class="bi bi-person-fill"></i></span>
                <div>
                    <h2>Pengaturan Akun</h2>
                    <p>Kelola profil dan keamanan akun kamu</p>
                </div>
            </div>
            <div class="pb-card-body">

                @if (session('success'))
                    <div class="pb-alert" style="background:#d4edda;border-color:#c3e6cb;color:#155724;">
                        <i class="bi bi-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any() && !$errors->has('current_password'))
                    <div class="pb-alert">
                        <i class="bi bi-exclamation-triangle"></i> Periksa kembali data yang kamu isi.
                    </div>
                @endif

                <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="pb-profile-layout">
                        <div class="pb-profile-side">
                            @if ($user->foto)
                                <img src="{{ asset('storage/'.$user->foto) }}" alt="Foto Profil" class="pb-avatar-img" id="avatarPreview">
                            @else
                                <div class="pb-avatar-placeholder" id="avatarPreview">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                            @endif
                            <div>
                                <label for="fotoInput" class="pb-btn-foto">
                                    <i class="bi bi-camera-fill"></i> Ubah Foto
                                </label>
                                <input type="file" id="fotoInput" name="foto" accept="image/*" class="pb-avatar-input">
                            </div>
                            <p class="pb-hint">JPG/PNG, maks 2MB</p>
                        </div>

                        <div class="pb-profile-main">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="pb-group">
                                        <label><i class="bi bi-person"></i> Nama</label>
                                        <input type="text" name="name" class="pb-input" value="{{ old('name', $user->name) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="pb-group">
                                        <label><i class="bi bi-envelope"></i> Email</label>
                                        <input type="email" name="email" class="pb-input" value="{{ old('email', $user->email) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="pb-group">
                                        <label><i class="bi bi-telephone"></i> No HP</label>
                                        <input type="text" name="no_hp" class="pb-input" value="{{ old('no_hp', $user->no_hp) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="pb-group">
                                        <label><i class="bi bi-calendar-event"></i> Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" class="pb-input"
                                               value="{{ old('tanggal_lahir', $user->tanggal_lahir?->format('Y-m-d')) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="pb-group">
                                        <label><i class="bi bi-person-badge"></i> Gender</label>
                                        <select name="gender" class="pb-input pb-select">
                                            <option value="">-- Pilih --</option>
                                            <option value="Laki-laki" {{ old('gender', $user->gender) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="Perempuan" {{ old('gender', $user->gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="pb-group">
                                        <label><i class="bi bi-geo-alt"></i> Alamat</label>
                                        <input type="text" name="alamat" class="pb-input" value="{{ old('alamat', $user->alamat) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="pb-actions" style="margin-top:1.6rem;">
                                <button type="submit" class="pb-btn-save"><i class="bi bi-save"></i> Simpan Perubahan</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="pb-password-block">
                    <div class="pb-section-label"><i class="bi bi-shield-lock-fill"></i> Ganti Password</div>

                    @if (session('success_password'))
                        <div class="pb-alert" style="background:#d4edda;border-color:#c3e6cb;color:#155724;">
                            <i class="bi bi-check-circle"></i> {{ session('success_password') }}
                        </div>
                    @endif

                    @if ($errors->has('current_password'))
                        <div class="pb-alert">
                            <i class="bi bi-exclamation-triangle"></i> {{ $errors->first('current_password') }}
                        </div>
                    @endif

                    <form action="{{ route('profil.password') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="pb-group">
                                    <label>Password Lama</label>
                                    <input type="password" name="current_password" class="pb-input">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="pb-group">
                                    <label>Password Baru</label>
                                    <input type="password" name="password" class="pb-input">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="pb-group">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" class="pb-input">
                                </div>
                            </div>
                        </div>

                        <div class="pb-actions" style="margin-top:1rem;">
                            <button type="submit" class="pb-btn-save"><i class="bi bi-key"></i> Ubah Password</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>

<script>
    document.getElementById('fotoInput').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function (ev) {
            const preview = document.getElementById('avatarPreview');
            const img = document.createElement('img');
            img.src = ev.target.result;
            img.className = 'pb-avatar-img';
            img.id = 'avatarPreview';
            preview.replaceWith(img);
        };
        reader.readAsDataURL(file);
    });
</script>
@endsection