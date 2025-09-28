@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit Slider</h4>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Slider Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $slider->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="text" class="form-label">Slider Text</label>
                        <textarea name="text" class="form-control" rows="3" required>{{ $slider->text }}</textarea>
                    </div>

                    @if ($slider->image)
                        <div class="mb-3">
                            <label>Current Image:</label><br>
                            <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider" height="100"
                                class="rounded mb-3">
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="image" class="form-label">Upload New Image</label>
                        <input type="file" name="image" class="form-control">
                        <div class="form-text">Recommended size: 1920 x 600 px</div>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Update Slider
                    </button>
                    <a href="{{ route('sliders.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
