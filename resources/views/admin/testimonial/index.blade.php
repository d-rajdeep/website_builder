@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Manage Testimonials</h4>
                <a href="{{ route('testimonials.create') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-plus-circle"></i> Add New Testimonial
                </a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($testimonials->count())
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th width="180">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonials as $testimonial)
                                    <tr>
                                        <td>{{ $testimonial->id }}</td>
                                        <td>{{ $testimonial->name ?? 'N/A' }}</td>
                                        <td>{{ $testimonial->title ?? 'N/A' }}</td>
                                        <td>{{ Str::limit($testimonial->description, 50) }}</td>
                                        <td>
                                            @if ($testimonial->image)
                                                <img src="{{ asset('storage/' . $testimonial->image) }}"
                                                    alt="Testimonial Image"
                                                    style="height: 60px; width: auto; object-fit: cover;"
                                                    class="border rounded">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('testimonials.edit', $testimonial->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <form action="{{ route('testimonials.destroy', $testimonial->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this testimonial?')">
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
                    <p class="text-muted">No testimonials found. Start by adding one.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
