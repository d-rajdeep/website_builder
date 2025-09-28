@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Logos</h4>
            <a href="{{ route('logos.create') }}" class="btn btn-light btn-sm">
                <i class="bi bi-plus-circle"></i> Upload Logo
            </a>
        </div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Logo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logos as $logo)
                        <tr>
                            <td>{{ $logo->id }}</td>
                            <td>
                                <img src="{{ asset('storage/'.$logo->image) }}"
                                     alt="Logo"
                                     style="height: 60px; width: auto; object-fit: contain;">
                            </td>
                            <td>
                                <a href="{{ route('logos.edit', $logo->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('logos.destroy', $logo->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($logos->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center">No logos uploaded yet.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
