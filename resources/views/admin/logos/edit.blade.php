@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Manage Logo</h4>
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

            <form action="{{ route('logos.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @if($logo && $logo->image)
                    <div class="mb-3 text-center">
                        <label class="form-label">Current Logo:</label><br>
                        <img src="{{ asset('storage/'.$logo->image) }}"
                             alt="Logo"
                             style="height: 80px; width: auto; object-fit: contain;"
                             class="mb-3 border rounded p-1">
                    </div>
                @endif

                <div class="mb-3">
                    <label for="image" class="form-label">Upload New Logo</label>
                    <input type="file" name="image" class="form-control">
                    <div class="form-text">Recommended height: 86px or below.</div>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Save
                    </button>
                    <a href="{{ route('logos.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Back
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
