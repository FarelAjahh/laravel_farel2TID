@extends('layouts.admin.app')

@section('content')
    <div class="py-4 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h4">Data User</h1>
            <p class="mb-0">Daftar seluruh user</p>
        </div>
        <a href="{{ route('user.create') }}" class="btn btn-success text-white">Tambah User</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card border-0 shadow mb-4">
        <div class="card-body table-responsive">
            <table class="table table-centered table-nowrap mb-0">
                <thead class="thead-light"><tr><th>Name</th><th>Email</th><th>Action</th></tr></thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('user.edit', $user) }}" class="btn btn-info btn-sm">Edit</a>
                                <form action="{{ route('user.destroy', $user) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center">Belum ada data user.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
