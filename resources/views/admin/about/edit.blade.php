@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit About</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $about->title) }}"
                            required>
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="text" class="form-label">Text</label>
                        <textarea name="text" class="form-control" rows="5" required>{{ old('text', $about->text) }}</textarea>
                        @error('text')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        @if ($about->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $about->image) }}" width="150" alt="{{ $about->title }}">
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Update</button>
                    <a href="{{ route('about.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
