@extends('layout.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Data Role</h4>
            <a href="/role_hero/tambah" class="btn btn-primary">Tambah Role</a>
        </div>
        <table class="table table-success table-striped-columns">
            <thead class="table-light" style="background-color: rgba(255, 255, 255, 0.8);">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Role</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($heroes as $key)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $key->Role }}</td>
                        <td>
                            <td>
                                <!-- Tombol Edit -->
                                <a href="/role_hero/{{ $key->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                            
                                <!-- Form untuk Tombol Hapus -->
                                <form action="{{ route('role_hero.destroy', $key->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
