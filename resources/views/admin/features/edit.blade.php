@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">Edit Features (3 at a time)</h4>
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

                <form action="{{ route('features.updateAll') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        @foreach ($features as $index => $feature)
                            <div class="col-md-4">
                                <div class="card mb-3 shadow-sm">
                                    <div class="card-header bg-light fw-bold">Feature {{ $index + 1 }}</div>
                                    <div class="card-body">
                                        <input type="hidden" name="features[{{ $index }}][id]"
                                            value="{{ $feature->id }}">

                                        <div class="mb-3">
                                            <label class="form-label">Icon</label>
                                            <input type="text" name="features[{{ $index }}][icon]"
                                                class="form-control"
                                                value="{{ old("features.$index.icon", $feature->icon) }}"
                                                placeholder="bi-star">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="features[{{ $index }}][title]"
                                                class="form-control"
                                                value="{{ old("features.$index.title", $feature->title) }}"
                                                placeholder="Enter title">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Text</label>
                                            <textarea name="features[{{ $index }}][text]" class="form-control" rows="3"
                                                placeholder="Enter description">{{ old("features.$index.text", $feature->text) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> Update Features
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
