@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="fw-bold text-primary">Admin Dashboard</h3>
                <p class="text-muted">Quick overview of your website modules.</p>
            </div>
        </div>

        <!-- First Row -->
        <div class="row g-4">
            <!-- Logos -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-4 h-100 text-center">
                    <div class="card-body">
                        <i class="bi bi-image fs-1 text-primary"></i>
                        <h6 class="mt-2">Logos</h6>
                        <a href="{{ route('logos.index') }}" class="btn btn-primary mt-3">
                            <i class="bi bi-eye me-1"></i> View Logos
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sliders -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-4 h-100 text-center">
                    <div class="card-body">
                        <i class="bi bi-images fs-1 text-success"></i>
                        <h6 class="mt-2">Sliders</h6>
                        <a href="{{ route('sliders.index') }}" class="btn btn-success mt-3">
                            <i class="bi bi-eye me-1"></i> View Sliders
                        </a>
                    </div>
                </div>
            </div>

            <!-- Features -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-4 h-100 text-center">
                    <div class="card-body">
                        <i class="bi bi-star fs-1 text-warning"></i>
                        <h6 class="mt-2">Features</h6>
                        <a href="{{ route('features.index') }}" class="btn btn-warning mt-3">
                            <i class="bi bi-eye me-1"></i> View Features
                        </a>
                    </div>
                </div>
            </div>

            <!-- About -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-4 h-100 text-center">
                    <div class="card-body">
                        <i class="bi bi-info-circle fs-1 text-info"></i>
                        <h6 class="mt-2">About</h6>
                        <a href="{{ route('about.index') }}" class="btn btn-info mt-3">
                            <i class="bi bi-eye me-1"></i> View About
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Row -->
        <div class="row g-4 mt-1">
            <!-- Counters -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-4 h-100 text-center">
                    <div class="card-body">
                        <i class="bi bi-graph-up fs-1 text-danger"></i>
                        <h6 class="mt-2">Counters</h6>
                        <a href="#" class="btn btn-danger mt-3">
                            <i class="bi bi-eye me-1"></i> View Counters
                        </a>
                    </div>
                </div>
            </div>

            <!-- Services -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-4 h-100 text-center">
                    <div class="card-body">
                        <i class="bi bi-briefcase fs-1 text-secondary"></i>
                        <h6 class="mt-2">Services</h6>
                        <a href="{{ route('services.index') }}" class="btn btn-secondary mt-3">
                            <i class="bi bi-eye me-1"></i> View Services
                        </a>
                    </div>
                </div>
            </div>

            <!-- Portfolio -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-4 h-100 text-center">
                    <div class="card-body">
                        <i class="bi bi-collection fs-1 text-primary"></i>
                        <h6 class="mt-2">Portfolio</h6>
                        <a href="{{ route('portfolios.index') }}" class="btn btn-primary mt-3">
                            <i class="bi bi-eye me-1"></i> View Portfolio
                        </a>
                    </div>
                </div>
            </div>

            <!-- Testimonials -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-4 h-100 text-center">
                    <div class="card-body">
                        <i class="bi bi-chat-quote fs-1 text-success"></i>
                        <h6 class="mt-2">Testimonials</h6>
                        <a href="{{ route('testimonials.index') }}" class="btn btn-success mt-3">
                            <i class="bi bi-eye me-1"></i> View Testimonials
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Third Row -->
        <div class="row g-4 mt-1">
            <!-- Contacts -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-4 h-100 text-center">
                    <div class="card-body">
                        <i class="bi bi-envelope fs-1 text-warning"></i>
                        <h6 class="mt-2">Contacts</h6>
                        <a href="{{ route('admin.contact.messages') }}" class="btn btn-warning mt-3">
                            <i class="bi bi-eye me-1"></i> View Contact Messages
                        </a>
                    </div>
                </div>
            </div>

            <!-- Custom CSS -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-4 h-100 text-center">
                    <div class="card-body">
                        <i class="bi bi-code-slash fs-1 text-info"></i>
                        <h6 class="mt-2">Custom CSS</h6>
                        <a href="#" class="btn btn-info mt-3">
                            <i class="bi bi-eye me-1"></i> View CSS
                        </a>
                    </div>
                </div>
            </div>

            <!-- Settings -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-4 h-100 text-center">
                    <div class="card-body">
                        <i class="bi bi-gear fs-1 text-dark"></i>
                        <h6 class="mt-2">Settings</h6>
                        <a href="#" class="btn btn-dark mt-3">
                            <i class="bi bi-eye me-1"></i> View Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
