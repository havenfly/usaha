<?php

namespace App\Http\Controllers;

use App\Models\HeroModel;
use App\Models\RoleHeroModel;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index()
    {
        $hero = HeroModel::get();
        $heroes = HeroModel::with('roleHero')->get(); // Nama relasi adalah 'roleHero'
        return view('hero', compact('heroes', 'hero'));
    }

    public function tambah()
    {
        $heroes = HeroModel::get();
        $role = RoleHeroModel::all(); // Ambil semua Role
        return view('hero_tambah', compact('role', 'heroes'));
    }

    public function action_tambah(Request $request)
    {
        $request->validate([
            'nama_hero' => 'required|string|max:255',
            'rolehero_id' => 'required|exists:role_hero,id',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tier' => 'required|in:S,S++',
        ]);

        HeroModel::create($request->all());
        return redirect()->route('hero_tambah')->with('success', 'Hero berhasil ditambahkan!');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $hero = HeroModel::findOrFail($id); // Ambil data hero berdasarkan ID
        $roles = RoleHeroModel::all(); // Ambil semua role
        return view('hero_edit', compact('hero', 'roles'));
    }

    // Menyimpan perubahan data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_hero' => 'required|string|max:255',
            'rolehero_id' => 'required|exists:role_hero,id',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tier' => 'required|in:S,S++',
        ]);

        $hero = HeroModel::findOrFail($id);
        $hero->update($request->all());
        return redirect()->route('hero')->with('success', 'Hero berhasil diperbarui!');
    }

    public function hapus($id)
    {
        $hero = HeroModel::findOrFail($id);
        $hero->delete();

        return back()->with('success','data mahasiswa berhasil dihapus.');
    }

}

