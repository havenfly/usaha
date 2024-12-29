<?php

namespace App\Http\Controllers;

use App\Models\RoleHeroModel;
use Illuminate\Http\Request;

class RoleHeroController extends Controller
{
    public function index()
    {
        $heroes = RoleHeroModel::get();
        $data = [
            'role_hero'=> RoleHeroModel::get(),
        ];
        

        return view('role_hero', compact('heroes','data'));
    }

     // Fungsi untuk menampilkan form tambah
     public function tambah()
     {
        $heroes = RoleHeroModel::get();
        return view('role_hero_tambah', compact('heroes'));
     }
 
     public function action_tambah(Request $request)
     {
         $Role = $request->Role;
 
         $role_hero = new RoleHeroModel();
         $role_hero->Role = $Role;
 
         $role_hero->save();
         return redirect('/role_hero')->with('success','jurusan berhasil ditambah');
     }
     public function edit($id)
     {
         // Temukan data berdasarkan ID
         $detail = RoleHeroModel::findOrFail($id);
 
         // Tampilkan view edit dengan data detail
         return view('role_hero_edit', compact('detail'));
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\RedirectResponse
      */
     public function update(Request $request, $id)
     {
        $heroes = RoleHeroModel::get();
         // Validasi input
         $request->validate([
             'Role' => 'required|string|max:255',
         ]);
 
         // Temukan data berdasarkan ID
         $heroes = RoleHeroModel::findOrFail($id);
 
         // Update data
         $heroes->update([
             'Role' => $request->Role,
         ]);
 
         // Redirect ke halaman role_hero dengan pesan sukses
         return redirect()->route('role_hero')->with('success', 'Data Role berhasil diperbarui.');
     }

     public function destroy($id)
    {
        // Cari data berdasarkan ID
        $roleHero = RoleHeroModel::findOrFail($id);

        // Hapus data dari database
        $roleHero->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('role_hero')->with('success', 'Data berhasil dihapus.');
    }

   
}




