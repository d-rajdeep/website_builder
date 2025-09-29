@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Edit Services</h4>
                <span class="badge bg-light text-dark">Editing {{ $services->count() }} services</span>
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

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('services.updateAll') }}" method="POST" id="services-form">
                    @csrf
                    @method('PUT')

                    <div id="services-container">
                        @foreach ($services as $service)
                            <div class="service-section mb-4">
                                <div class="card shadow-sm">
                                    <div
                                        class="card-header bg-light fw-bold d-flex justify-content-between align-items-center">
                                        <span>Service {{ $index + 1 }}</span>
                                        @if ($service->count() > 1)
                                            <button type="button" class="btn btn-sm btn-danger remove-service"
                                                data-service-id="{{ $service->id }}">
                                                <i class="bi bi-trash"></i> Remove
                                            </button>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <input type="hidden" name="services[{{ $index }}][id]"
                                            value="{{ $service->id }}">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Icon</label>
                                                    <input type="text" name="services[{{ $index }}][icon]"
                                                        class="form-control"
                                                        value="{{ old('services.' . $index . '.icon', $service->icon) }}"
                                                        placeholder="e.g. bi bi-activity or fas fa-icon">
                                                    <small class="text-muted">Use Bootstrap Icons (bi) or Font Awesome
                                                        classes</small>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Link</label>
                                                    <input type="text" name="services[{{ $index }}][link]"
                                                        class="form-control"
                                                        value="{{ old('services.' . $index . '.link', $service->link) }}"
                                                        placeholder="Enter optional link">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Title <span class="text-danger">*</span></label>
                                            <input type="text" name="services[{{ $index }}][title]"
                                                class="form-control"
                                                value="{{ old('services.' . $index . '.title', $service->title) }}"
                                                required placeholder="Enter service title">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Description <span class="text-danger">*</span></label>
                                            <textarea name="services[{{ $index }}][description]" class="form-control" rows="3"
                                                placeholder="Enter service description" required>{{ old('services.' . $index . '.description', $service->description) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> Update All Services
                        </button>
                        <a href="{{ route('services.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this service? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Service</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const servicesContainer = document.getElementById('services-container');

            // Delete service functionality
            servicesContainer.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-service') ||
                    e.target.closest('.remove-service')) {
                    const removeBtn = e.target.classList.contains('remove-service') ?
                        e.target : e.target.closest('.remove-service');
                    const serviceId = removeBtn.getAttribute('data-service-id');

                    // Set up the delete form action
                    const deleteForm = document.getElementById('deleteForm');
                    deleteForm.action = `{{ route('services.destroy', '') }}/${serviceId}`;

                    // Show the confirmation modal
                    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
                    deleteModal.show();
                }
            });
        });
    </script>

    <style>
        .service-section {
            transition: all 0.3s ease;
        }

        .service-section:hover {
            transform: translateY(-2px);
        }

        .badge {
            font-size: 0.8rem;
        }
    </style>
@endsection
