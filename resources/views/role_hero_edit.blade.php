@extends('layout.template')

@section('content')
    <form class="card" action="{{ route('role_hero_update', $detail->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="card-header">
        <h4>Edit Data Role</h4>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label for="Role" class="form-label">Role</label>
            <input type="text" class="form-control" value="{{ $detail->Role }}" name="Role" id="Role">
    </div>
    <div class="card-footer">
        <button class="btn btn-primary" type="submit">Edit</button>
        <a href="/role_hero" class="btn btn-danger">Kembali</a>
    </div>
</form>

@endsection