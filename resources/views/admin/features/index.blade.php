@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Manage Features</h4>
                <a href="{{ route('features.create') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-plus-circle"></i> Add New Feature
                </a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($features->count())
                    <div class="row">
                        @foreach ($features as $feature)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body text-center">
                                        <div class="icon mb-3" style="font-size: 2rem; color: #0d6efd;">
                                            <i class="bi {{ $feature->icon ?? 'bi-star' }}"></i>
                                        </div>
                                        <h5 class="card-title">{{ $feature->title }}</h5>
                                        <p class="card-text text-muted">{{ Str::limit($feature->text, 100) }}</p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        <a href="{{ route('features.edit', $feature->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form action="{{ route('features.destroy', $feature->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this feature?')">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">No features found. Start by adding one.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
