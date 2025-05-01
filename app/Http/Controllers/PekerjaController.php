<?php
// app/Http/Controllers/PekerjaController.php
namespace App\Http\Controllers;

use App\Models\Pekerja;
use Illuminate\Http\Request;

class PekerjaController extends Controller
{
    public function index()
    {
        $pekerjas = Pekerja::all();
        return view('pekerja.index', compact('pekerjas'));
    }

    public function create()
    {
        return view('pekerja.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'email' => 'required|email|unique:pekerjas',
        ]);

        Pekerja::create($request->all());

        return redirect()->route('pekerja.index')->with('success', 'Pekerja berhasil ditambahkan.');
    }

    public function edit(Pekerja $pekerja)
    {
        return view('pekerja.edit', compact('pekerja'));
    }

    public function update(Request $request, Pekerja $pekerja)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'email' => 'required|email|unique:pekerjas,email,' . $pekerja->id,
        ]);

        $pekerja->update($request->all());

        return redirect()->route('pekerja.index')->with('success', 'Data berhasil diubah.');
    }

    public function destroy(Pekerja $pekerja)
    {
        $pekerja->delete();

        return redirect()->route('pekerja.index')->with('success', 'Data berhasil dihapus.');
    }
}
