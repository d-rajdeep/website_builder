@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Manage Services</h4>
                <div>
                    {{-- <a href="{{ route('services.editAll') }}" class="btn btn-warning btn-sm me-2">
                        <i class="bi bi-pencil-square"></i> Edit All Services
                    </a> --}}
                    <a href="{{ route('services.create') }}" class="btn btn-light btn-sm">
                        <i class="bi bi-plus-circle"></i> Add New Service
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($services->count())
                    <!-- Stats Overview -->
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body text-center py-3">
                                    <h4 class="mb-0">{{ $services->count() }}</h4>
                                    <small>Total Services</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card bg-light">
                                <div class="card-body py-3">
                                    <small class="text-muted">
                                        <i class="bi bi-info-circle me-1"></i>
                                        Showing all {{ $services->count() }} services. Frontend will display first 6
                                        services.
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Services Grid - Updated for better layout -->
                    <div class="row">
                        @foreach ($services as $service)
                            <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                                <div class="card h-100 service-card shadow-sm border-0">
                                    <div class="card-header bg-transparent border-bottom-0 pt-3">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div class="icon-wrapper" style="font-size: 2.5rem; color: #0d6efd;">
                                                <i class="{{ $service->icon ?? 'bi bi-star' }}"></i>
                                            </div>
                                            <div>
                                                <span class="badge bg-primary rounded-pill">#{{ $loop->iteration }}</span>
                                                @if ($loop->iteration <= 6)
                                                    <span class="badge bg-success rounded-pill ms-1">Active</span>
                                                @else
                                                    <span class="badge bg-secondary rounded-pill ms-1">Extra</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <h5 class="card-title fw-bold text-dark mb-2">{{ $service->title }}</h5>
                                        <p class="card-text text-muted mb-3">{{ Str::limit($service->description, 100) }}
                                        </p>

                                        @if ($service->link)
                                            <div class="mb-3">
                                                <small class="text-primary">
                                                    <i class="bi bi-link-45deg me-1"></i>
                                                    {{ Str::limit($service->link, 30) }}
                                                </small>
                                            </div>
                                        @endif

                                        <div class="service-meta">
                                            <small class="text-muted">
                                                <i class="bi bi-clock me-1"></i>
                                                Created: {{ $service->created_at->format('M d, Y') }}
                                            </small>
                                            @if ($service->updated_at->ne($service->created_at))
                                                <br>
                                                <small class="text-muted">
                                                    <i class="bi bi-arrow-clockwise me-1"></i>
                                                    Updated: {{ $service->updated_at->format('M d, Y') }}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top-0 pt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('services.edit', $service->id) }}"
                                                    class="btn btn-outline-warning btn-sm" data-bs-toggle="tooltip"
                                                    title="Edit Service">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                                <form action="{{ route('services.destroy', $service->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                                        data-bs-toggle="tooltip" title="Delete Service"
                                                        onclick="return confirm('Are you sure you want to delete this service?')">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Services Status Info -->
                    <div class="row mt-4">
                        <div class="col-12">
                            @if ($services->count() > 6)
                                <div class="alert alert-warning">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-exclamation-triangle me-3" style="font-size: 1.5rem;"></i>
                                        <div>
                                            <h6 class="alert-heading mb-1">Note: Only first 6 services will display on
                                                frontend</h6>
                                            <p class="mb-0">You have {{ $services->count() }} services but only the first
                                                6 (marked with <span class="badge bg-success">Active</span>) will show on
                                                your website. Services marked with <span
                                                    class="badge bg-secondary">Extra</span> are stored but not displayed.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($services->count() == 6)
                                <div class="alert alert-success">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-check-circle me-3" style="font-size: 1.5rem;"></i>
                                        <div>
                                            <h6 class="alert-heading mb-1">Perfect! All 6 services are active</h6>
                                            <p class="mb-0">All your services will be displayed on the frontend. You can
                                                edit or rearrange them as needed.</p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-info">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-info-circle me-3" style="font-size: 1.5rem;"></i>
                                        <div>
                                            <h6 class="alert-heading mb-1">You have {{ 6 - $services->count() }} service
                                                slots available</h6>
                                            <p class="mb-0">Add more services to maximize your website's service section.
                                                You can have up to 6 services displayed.</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-5">
                        <div class="empty-state-icon mb-4">
                            <i class="bi bi-gear" style="font-size: 4rem; color: #6c757d;"></i>
                        </div>
                        <h4 class="text-muted mb-3">No Services Found</h4>
                        <p class="text-muted mb-4">Get started by creating your first service to showcase on your website.
                        </p>
                        <a href="{{ route('services.create') }}" class="btn btn-primary btn-lg">
                            <i class="bi bi-plus-circle me-2"></i> Create Your First Service
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .service-card {
            transition: all 0.3s ease;
            border: 1px solid #e9ecef;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15) !important;
            border-color: #0d6efd;
        }

        .icon-wrapper {
            transition: all 0.3s ease;
        }

        .service-card:hover .icon-wrapper {
            transform: scale(1.1);
        }

        .empty-state-icon {
            opacity: 0.7;
        }

        .btn-group .btn {
            border-radius: 0.375rem !important;
            margin-left: 0.25rem;
        }

        .service-meta {
            border-top: 1px solid #e9ecef;
            padding-top: 0.75rem;
            margin-top: 0.75rem;
        }

        /* Ensure proper card height and spacing */
        .card.h-100 {
            min-height: 350px;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });

            // Auto-dismiss alerts after 5 seconds
            setTimeout(function() {
                var alerts = document.querySelectorAll('.alert');
                alerts.forEach(function(alert) {
                    var bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 5000);
        });
    </script>
@endpush
