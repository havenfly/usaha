@extends('layout.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Tambah Data Hero</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('hero_tambah') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_hero" class="form-label">Nama Hero</label>
                    <input type="text" class="form-control" id="nama_hero" name="nama_hero"
                        placeholder="Masukkan Nama Hero" value="{{ old('nama_hero') }}" required>
                    @error('nama_hero')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="rolehero_id" class="form-label">Role Hero</label>
                    <select class="form-control" id="rolehero_id" name="rolehero_id" required>
                        <option value="" disabled selected>Pilih Role Hero</option>
                        @foreach ($role as $item)
                            <option value="{{ $item->id }}">{{ $item->Role }}</option>
                        @endforeach
                    </select>
                    @error('role_hero')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tier" class="form-label">Tier</label>
                    <select class="form-control" id="tier" name="tier" required>
                        <option value="" disabled selected>Pilih Tier</option>
                        <option value="S">S</option>
                        <option value="S++">S++</option>
                    </select>
                    @error('tier')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('hero') }}" class="btn btn-danger">Kembali</a>
                </div>

                <div class="mb-3">
    @endsection
