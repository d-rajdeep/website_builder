@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Manage Portfolios</h4>
                <a href="{{ route('portfolios.create') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-plus-circle"></i> Add New Portfolio
                </a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($portfolios->count())
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Short Text</th>
                                    <th>Image</th>
                                    <th width="180">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($portfolios as $portfolio)
                                    <tr>
                                        <td>{{ $portfolio->id }}</td>
                                        <td>{{ $portfolio->title }}</td>
                                        <td>{{ Str::limit($portfolio->short_text, 50) }}</td>
                                        <td>
                                            @if ($portfolio->image)
                                                <img src="{{ asset('storage/' . $portfolio->image) }}" alt="Portfolio Image"
                                                    style="height: 60px; width: auto; object-fit: cover;"
                                                    class="border rounded">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('portfolios.edit', $portfolio->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <form action="{{ route('portfolios.destroy', $portfolio->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this portfolio?')">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted">No portfolios found. Start by adding one.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
