<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;
use App\Models\Atraksi;
class DestinasiController extends Controller
{
    public function index(Request $request)
{
    $keyword = $request->input('cari');
    $kategori = $request->input('kategori');

    $destinasiList = Destinasi::when($keyword, function ($query) use ($keyword) {
            $query->where('nama', 'like', '%' . $keyword . '%');
        })
        ->when($kategori, function ($query) use ($kategori) {
            $query->where('kategori', $kategori);
        })
        ->latest()
        ->paginate(2);

    $jumlahAlam = Destinasi::where('kategori', 'alam')->count();
    $jumlahBudaya = Destinasi::where('kategori', 'budaya')->count();
    $jumlahKuliner = Destinasi::where('kategori', 'kuliner')->count();

    return view('destinasi', compact('destinasiList', 'keyword', 'kategori', 'jumlahAlam', 'jumlahBudaya', 'jumlahKuliner'));
}
    public function show($id)
    {
        $destinasi = Destinasi::with(['atraksi', 'ulasan.user'])->findOrFail($id);

        return view('destinasi-detail', [
            'destinasi' => $destinasi,
        ]);
    }

    public function create()
    {
        return view('destinasi-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'       => 'required|string|min:3|max:150',
            'deskripsi'  => 'required|string|min:10',
            'gambar'     => 'nullable|image|max:2048',
            'jam_buka'   => 'required|date_format:H:i',
            'jam_tutup'  => 'required|date_format:H:i|after:jam_buka',
            'lokasi'     => 'required|string|max:255',
            'kategori'   => 'required|in:alam,budaya,kuliner',
            'harga_tiket'  => 'nullable|integer|min:0',
        ], [
            'nama.required'      => 'Nama destinasi wajib diisi.',
            'nama.min'           => 'Nama destinasi minimal :min karakter.',
            'nama.max'           => 'Nama destinasi maksimal :max karakter.',

            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'deskripsi.min'      => 'Deskripsi minimal :min karakter agar cukup informatif.',

            'gambar.required'    => 'Nama file gambar wajib diisi.',
            'gambar.max'         => 'Nama file gambar maksimal :max karakter.',

            'jam_buka.required'      => 'Jam buka wajib diisi.',
            'jam_buka.date_format'   => 'Format jam buka harus HH:MM (contoh: 08:00).',

            'jam_tutup.required'     => 'Jam tutup wajib diisi.',
            'jam_tutup.date_format'  => 'Format jam tutup harus HH:MM (contoh: 17:00).',
            'jam_tutup.after'        => 'Jam tutup harus lebih besar dari jam buka.',

            'lokasi.required'    => 'Lokasi wajib diisi.',
            'lokasi.max'         => 'Lokasi maksimal :max karakter.',
            'kategori.required'  => 'Kategori wajib dipilih.',
            'kategori.in'        => 'Kategori harus salah satu dari: alam, budaya, kuliner.',

            'harga_tiket.integer' => 'Harga tiket harus berupa angka.',
            'harga_tiket.min'     => 'Harga tiket tidak boleh negatif.',
        ]);

              $validated['gambar'] = $request->file('gambar')->store('destinasi', 'public');
                Destinasi::create($validated);



        $destinasi = Destinasi::create($validated);

        return redirect()->route('destinasi.detail', $destinasi->id)
            ->with('success', 'Destinasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $destinasi = Destinasi::findOrFail($id);
        return view('destinasi-edit', compact('destinasi'));
    }

    public function update(Request $request, $id)
{
    $destinasi = Destinasi::findOrFail($id);

    $validated = $request->validate([
        'nama'       => 'required|string|min:3|max:150',
        'deskripsi'  => 'required|string|min:10',
        'gambar'    => 'nullable|image|max:2048',
        'jam_buka'   => 'required|date_format:H:i',
        'jam_tutup'  => 'required|date_format:H:i|after:jam_buka',
        'lokasi'     => 'required|string|max:255',
        'kategori'   => 'required|in:alam,budaya,kuliner',
        'harga_tiket'  => 'nullable|integer|min:0',
    ], [
        'nama.required'      => 'Nama destinasi wajib diisi.',
        'nama.min'           => 'Nama destinasi minimal :min karakter.',
        'nama.max'           => 'Nama destinasi maksimal :max karakter.',

        'deskripsi.required' => 'Deskripsi wajib diisi.',
        'deskripsi.min'      => 'Deskripsi minimal :min karakter agar cukup informatif.',

        'gambar.required'    => 'Nama file gambar wajib diisi.',
        'gambar.max'         => 'Nama file gambar maksimal :max karakter.',

        'jam_buka.required'      => 'Jam buka wajib diisi.',
        'jam_buka.date_format'   => 'Format jam buka harus HH:MM (contoh: 08:00).',

        'jam_tutup.required'     => 'Jam tutup wajib diisi.',
        'jam_tutup.date_format'  => 'Format jam tutup harus HH:MM (contoh: 17:00).',
        'jam_tutup.after'        => 'Jam tutup harus lebih besar dari jam buka.',

        'lokasi.required'    => 'Lokasi wajib diisi.',
        'lokasi.max'         => 'Lokasi maksimal :max karakter.',
        'kategori.required'  => 'Kategori wajib dipilih.',
        'kategori.in'        => 'Kategori harus salah satu dari: alam, budaya, kuliner.',

        'harga_tiket.integer' => 'Harga tiket harus berupa angka.',
        'harga_tiket.min'     => 'Harga tiket tidak boleh negatif.',
    ]);

          if ($request->hasFile('gambar')) {
               $validated['gambar'] = $request->file('gambar')->store('destinasi', 'public');
                } else {
                  unset($validated['gambar']);
                }
         $destinasi->update($validated);

    return redirect()->route('destinasi.detail', $destinasi->id)
        ->with('success', 'Destinasi berhasil diperbarui!');
}

    public function destroy($id)
    {
        $destinasi = Destinasi::findOrFail($id);
        $destinasi->delete();

        return redirect()->route('destinasi')
            ->with('success', 'Destinasi berhasil dihapus!');
    }
}