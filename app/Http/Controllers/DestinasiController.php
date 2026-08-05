<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;

class DestinasiController extends Controller
{
    /**
     * Aturan validasi form destinasi.
     * Dipisah jadi method sendiri supaya bisa dipakai ulang
     * di store() maupun update() tanpa duplikasi kode.
     */
    private function rules()
    {
        return [
            'nama'       => 'required|string|min:3|max:150',
            'deskripsi'  => 'required|string|min:10',
            'gambar'     => 'required|string|max:255',
            'jam_buka'   => 'required|date_format:H:i',
            'jam_tutup'  => 'required|date_format:H:i|after:jam_buka',
            'lokasi'     => 'required|string|max:255',
        ];
    }

    /**
     * Pesan error custom berbahasa Indonesia.
     */
    private function messages()
    {
        return [
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
        ];
    }

    public function index(Request $request)
    {
        $keyword = $request->input('cari');

        $destinasiList = Destinasi::when($keyword, function ($query) use ($keyword) {
                $query->where('nama', 'like', '%' . $keyword . '%');
            })
            ->latest()
            ->paginate(2);

        return view('destinasi', compact('destinasiList', 'keyword'));
    }

    public function show($id)
    {
        $destinasi = Destinasi::findOrFail($id);

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
        $validated = $request->validate($this->rules(), $this->messages());

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

        $validated = $request->validate($this->rules(), $this->messages());

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