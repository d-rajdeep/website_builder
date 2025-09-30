@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit Portfolio</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('portfolios.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control"
                            value="{{ old('title', $portfolio->title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Short Text</label>
                        <textarea name="short_text" class="form-control" rows="3">{{ old('short_text', $portfolio->short_text) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        @if ($portfolio->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $portfolio->image) }}" alt="Portfolio Image"
                                    style="height: 100px; width: auto; object-fit: cover;" class="border rounded">
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control">
                        <small class="text-muted">Upload only if you want to replace the existing image.</small>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Update
                    </button>
                    <a href="{{ route('portfolios.index') }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle"></i> Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
