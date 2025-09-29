@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Add Services (6 at a time)</h4>
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

                <form action="{{ route('services.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        {{-- Service 1 --}}
                        <div class="col-md-4">
                            <div class="card mb-3 shadow-sm">
                                <div class="card-header bg-light fw-bold">Service 1</div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Icon</label>
                                        <input type="text" name="services[0][icon]" class="form-control"
                                            placeholder="bi bi-activity" value="{{ old('services.0.icon') }}">
                                        <small class="text-muted">Use Bootstrap Icons like "bi bi-activity"</small>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Title <span class="text-danger">*</span></label>
                                        <input type="text" name="services[0][title]" class="form-control"
                                            placeholder="Enter title" value="{{ old('services.0.title') }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description <span class="text-danger">*</span></label>
                                        <textarea name="services[0][description]" class="form-control" rows="3" placeholder="Enter description" required>{{ old('services.0.description') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Link</label>
                                        <input type="text" name="services[0][link]" class="form-control"
                                            placeholder="Enter optional link" value="{{ old('services.0.link') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Service 2 --}}
                        <div class="col-md-4">
                            <div class="card mb-3 shadow-sm">
                                <div class="card-header bg-light fw-bold">Service 2</div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Icon</label>
                                        <input type="text" name="services[1][icon]" class="form-control"
                                            placeholder="bi bi-broadcast" value="{{ old('services.1.icon') }}">
                                        <small class="text-muted">Use Bootstrap Icons like "bi bi-broadcast"</small>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Title <span class="text-danger">*</span></label>
                                        <input type="text" name="services[1][title]" class="form-control"
                                            placeholder="Enter title" value="{{ old('services.1.title') }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description <span class="text-danger">*</span></label>
                                        <textarea name="services[1][description]" class="form-control" rows="3" placeholder="Enter description" required>{{ old('services.1.description') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Link</label>
                                        <input type="text" name="services[1][link]" class="form-control"
                                            placeholder="Enter optional link" value="{{ old('services.1.link') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Service 3 --}}
                        <div class="col-md-4">
                            <div class="card mb-3 shadow-sm">
                                <div class="card-header bg-light fw-bold">Service 3</div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Icon</label>
                                        <input type="text" name="services[2][icon]" class="form-control"
                                            placeholder="bi bi-easel" value="{{ old('services.2.icon') }}">
                                        <small class="text-muted">Use Bootstrap Icons like "bi bi-easel"</small>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Title <span class="text-danger">*</span></label>
                                        <input type="text" name="services[2][title]" class="form-control"
                                            placeholder="Enter title" value="{{ old('services.2.title') }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description <span class="text-danger">*</span></label>
                                        <textarea name="services[2][description]" class="form-control" rows="3" placeholder="Enter description"
                                            required>{{ old('services.2.description') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Link</label>
                                        <input type="text" name="services[2][link]" class="form-control"
                                            placeholder="Enter optional link" value="{{ old('services.2.link') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Service 4 --}}
                        <div class="col-md-4">
                            <div class="card mb-3 shadow-sm">
                                <div class="card-header bg-light fw-bold">Service 4</div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Icon</label>
                                        <input type="text" name="services[3][icon]" class="form-control"
                                            placeholder="bi bi-bounding-box-circles"
                                            value="{{ old('services.3.icon') }}">
                                        <small class="text-muted">Use Bootstrap Icons like "bi
                                            bi-bounding-box-circles"</small>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Title <span class="text-danger">*</span></label>
                                        <input type="text" name="services[3][title]" class="form-control"
                                            placeholder="Enter title" value="{{ old('services.3.title') }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description <span class="text-danger">*</span></label>
                                        <textarea name="services[3][description]" class="form-control" rows="3" placeholder="Enter description"
                                            required>{{ old('services.3.description') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Link</label>
                                        <input type="text" name="services[3][link]" class="form-control"
                                            placeholder="Enter optional link" value="{{ old('services.3.link') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Service 5 --}}
                        <div class="col-md-4">
                            <div class="card mb-3 shadow-sm">
                                <div class="card-header bg-light fw-bold">Service 5</div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Icon</label>
                                        <input type="text" name="services[4][icon]" class="form-control"
                                            placeholder="bi bi-calendar4-week" value="{{ old('services.4.icon') }}">
                                        <small class="text-muted">Use Bootstrap Icons like "bi bi-calendar4-week"</small>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Title <span class="text-danger">*</span></label>
                                        <input type="text" name="services[4][title]" class="form-control"
                                            placeholder="Enter title" value="{{ old('services.4.title') }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description <span class="text-danger">*</span></label>
                                        <textarea name="services[4][description]" class="form-control" rows="3" placeholder="Enter description"
                                            required>{{ old('services.4.description') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Link</label>
                                        <input type="text" name="services[4][link]" class="form-control"
                                            placeholder="Enter optional link" value="{{ old('services.4.link') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Service 6 --}}
                        <div class="col-md-4">
                            <div class="card mb-3 shadow-sm">
                                <div class="card-header bg-light fw-bold">Service 6</div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Icon</label>
                                        <input type="text" name="services[5][icon]" class="form-control"
                                            placeholder="bi bi-chat-square-text" value="{{ old('services.5.icon') }}">
                                        <small class="text-muted">Use Bootstrap Icons like "bi bi-chat-square-text"</small>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Title <span class="text-danger">*</span></label>
                                        <input type="text" name="services[5][title]" class="form-control"
                                            placeholder="Enter title" value="{{ old('services.5.title') }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description <span class="text-danger">*</span></label>
                                        <textarea name="services[5][description]" class="form-control" rows="3" placeholder="Enter description"
                                            required>{{ old('services.5.description') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Link</label>
                                        <input type="text" name="services[5][link]" class="form-control"
                                            placeholder="Enter optional link" value="{{ old('services.5.link') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> Save All Services
                        </button>
                        <a href="{{ route('services.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
