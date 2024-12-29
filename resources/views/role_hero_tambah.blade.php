@extends('layout.template')

@section('content')
    <form class="card" action="/role_hero/tambah" method="POST">
        @csrf
        <div class="card-header">
            <h4>Tambah Data Role Hero</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="nama_jenazah" class="form-label">Role</label>
                <input type="text" class="form-control" name="Role" id="Role" placeholder="Role">
            </div>
        </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" type="submit">Simpan</button>
            <a href="/role_hero" class="btn btn-danger">Kembali</a>
        </div>
    </form>
@endsection
