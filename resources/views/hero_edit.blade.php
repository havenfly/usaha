@extends('layout.template')

@section('content')
<form action="{{ route('hero_update', $hero->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Hero Name:</label>
        <input type="text" id="name" name="nama_hero" value="{{ $hero->nama_hero }}" required>
    </div>
    <div>
        <label for="rolehero_id">Role:</label>
        <select id="rolehero_id" name="rolehero_id" required>
            @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ $hero->rolehero_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="jenis_kelamin">Gender:</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="Laki-Laki" {{ $hero->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
            <option value="Perempuan" {{ $hero->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>
    <div>
        <label for="tier">Tier:</label>
        <select id="tier" name="tier" required>
            <option value="S" {{ $hero->tier == 'S' ? 'selected' : '' }}>S</option>
            <option value="S++" {{ $hero->tier == 'S++' ? 'selected' : '' }}>S++</option>
        </select>
    </div>
    <button type="submit">Update Hero</button>
</form>

<form action="{{ route('hero.destroy', $hero->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this hero?');">
    @csrf
    @method('DELETE')
    <button type="submit">Delete Hero</button>
</form>
@endsection
