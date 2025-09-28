@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Manage Sliders</h4>
                <a href="{{ route('sliders.create') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-plus-circle"></i> Add New Slider
                </a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($sliders->count())
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Text</th>
                                    <th>Image</th>
                                    <th width="180">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td>{{ $slider->id }}</td>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ Str::limit($slider->text, 50) }}</td>
                                        <td>
                                            @if ($slider->image)
                                                <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider Image"
                                                    style="height: 60px; width: auto; object-fit: cover;"
                                                    class="border rounded">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('sliders.edit', $slider->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this slider?')">
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
                    <p class="text-muted">No sliders found. Start by adding one.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
