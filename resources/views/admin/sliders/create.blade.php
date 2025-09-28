@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Add New Slider</h4>
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

                <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Slider Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter slider title" required>
                    </div>

                    <div class="mb-3">
                        <label for="text" class="form-label">Slider Text</label>
                        <textarea name="text" class="form-control" rows="3" placeholder="Enter slider description" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Slider Image</label>
                        <input type="file" name="image" class="form-control" required>
                        <div class="form-text">Recommended size: 800 x 752 px</div>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-upload"></i> Save Slider
                    </button>
                    <a href="{{ route('sliders.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
