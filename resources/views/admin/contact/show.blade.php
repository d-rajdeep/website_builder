@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Message Details</h4>
                        <div>
                            <a href="{{ route('admin.contact.messages') }}" class="btn btn-light btn-sm">
                                <i class="bi bi-arrow-left"></i> Back to Messages
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <p><strong>Name:</strong> {{ $contactMessage->name }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Mobile:</strong>
                                    <a href="tel:{{ $contactMessage->mobile }}" class="text-decoration-none">
                                        {{ $contactMessage->mobile }}
                                    </a>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Email:</strong>
                                    <a href="mailto:{{ $contactMessage->email }}" class="text-decoration-none">
                                        {{ $contactMessage->email }}
                                    </a>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Date:</strong> {{ $contactMessage->created_at->format('F d, Y \a\t h:i A') }}</p>
                            </div>
                            <div class="col-12">
                                <p><strong>Subject:</strong> {{ $contactMessage->subject }}</p>
                            </div>
                        </div>

                        <div class="message-content">
                            <p><strong>Message:</strong></p>
                            <div class="border p-4 bg-light rounded">
                                {!! nl2br(e($contactMessage->message)) !!}
                            </div>
                        </div>

                        <div class="mt-4 d-flex gap-2 flex-wrap">
                            <a href="mailto:{{ $contactMessage->email }}?subject=Re: {{ $contactMessage->subject }}"
                                class="btn btn-primary">
                                <i class="bi bi-reply"></i> Reply via Email
                            </a>
                            <a href="tel:{{ $contactMessage->mobile }}" class="btn btn-outline-primary">
                                <i class="bi bi-telephone"></i> Call
                            </a>
                            <form action="{{ route('admin.contact.messages.destroy', $contactMessage->id) }}"
                                method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this message?')">
                                    <i class="bi bi-trash"></i> Delete Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">Message Info</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Status:</strong>
                            @if ($contactMessage->is_read)
                                <span class="badge bg-success">Read</span>
                            @else
                                <span class="badge bg-warning">Unread</span>
                            @endif
                        </p>
                        <p><strong>Message Length:</strong> {{ strlen($contactMessage->message) }} characters</p>
                        <p><strong>Received:</strong> {{ $contactMessage->created_at->diffForHumans() }}</p>

                        @if ($contactMessage->created_at != $contactMessage->updated_at)
                            <p><strong>Last Viewed:</strong> {{ $contactMessage->updated_at->diffForHumans() }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
