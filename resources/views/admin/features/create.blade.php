@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Add Features (3 at a time)</h4>
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

                <form action="{{ route('features.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        {{-- Feature 1 --}}
                        <div class="col-md-4">
                            <div class="card mb-3 shadow-sm">
                                <div class="card-header bg-light fw-bold">Feature 1</div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Icon</label>
                                        <input type="text" name="features[0][icon]" class="form-control"
                                            placeholder="bi-star">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="features[0][title]" class="form-control"
                                            placeholder="Enter title">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Text</label>
                                        <textarea name="features[0][text]" class="form-control" rows="3" placeholder="Enter description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Feature 2 --}}
                        <div class="col-md-4">
                            <div class="card mb-3 shadow-sm">
                                <div class="card-header bg-light fw-bold">Feature 2</div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Icon</label>
                                        <input type="text" name="features[1][icon]" class="form-control"
                                            placeholder="bi-activity">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="features[1][title]" class="form-control"
                                            placeholder="Enter title">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Text</label>
                                        <textarea name="features[1][text]" class="form-control" rows="3" placeholder="Enter description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Feature 3 --}}
                        <div class="col-md-4">
                            <div class="card mb-3 shadow-sm">
                                <div class="card-header bg-light fw-bold">Feature 3</div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Icon</label>
                                        <input type="text" name="features[2][icon]" class="form-control"
                                            placeholder="bi-calendar4-week">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="features[2][title]" class="form-control"
                                            placeholder="Enter title">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Text</label>
                                        <textarea name="features[2][text]" class="form-control" rows="3" placeholder="Enter description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> Save Features
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
