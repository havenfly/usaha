@extends('layout.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Data Hero</h4>
            <a href="/hero/tambah" class="btn btn-primary">Tambah Hero</a>
        </div>
        <table class="table table-success table-striped-columns">
            <thead class="table-light" style="background-color: rgba(255, 255, 255, 0.8);">
                <tr>
                    <th scope="col">Id hero</th>
                    <th scope="col">Nama Hero</th>
                    <th scope="col">Role Hero</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Tier</th>
                    <th scope="col">Actions</th> <!-- Added Actions column -->
                </tr>
            </thead>
            <tbody>
                @foreach ($heroes as $hero)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $hero->nama_hero }}</td>
                        <td>{{ $hero->roleHero->Role }}</td> <!-- Memanggil relasi roleHero -->
                        <td>{{ $hero->jenis_kelamin }}</td>
                        <td>{{ $hero->tier }}</td>
                        <td>
                            <a href="{{ route('hero_edit', $hero->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('hero.destroy', $hero->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this hero?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
