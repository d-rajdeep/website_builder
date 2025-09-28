@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Upload Logo</h4>
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

            <form action="{{ route('logos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="image" class="form-label">Select Logo Image</label>
                    <input type="file" class="form-control" name="image" id="image" required>
                    <div class="form-text">Recommended height: 86px or below.</div>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="bi bi-upload"></i> Upload Logo
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
