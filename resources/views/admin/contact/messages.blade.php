@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Contact Messages</h4>
                <span class="badge bg-light text-dark">{{ $messages->count() }} Total Messages</span>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if ($messages->count())
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th width="120">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $message)
                                    <tr class="{{ $message->is_read ? '' : 'bg-light-warning' }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <strong>{{ $message->name }}</strong>
                                            @if (!$message->is_read)
                                                <span class="badge bg-danger ms-1">New</span>
                                            @endif
                                        </td>
                                        <td>{{ $message->mobile }}</td>
                                        <td>
                                            <a href="mailto:{{ $message->email }}" class="text-decoration-none">
                                                {{ $message->email }}
                                            </a>
                                        </td>
                                        <td>{{ Str::limit($message->subject, 30) }}</td>
                                        <td>
                                            @if ($message->is_read)
                                                <span class="badge bg-success">Read</span>
                                            @else
                                                <span class="badge bg-warning">Unread</span>
                                            @endif
                                        </td>
                                        <td>{{ $message->created_at->format('M d, Y h:i A') }}</td>
                                        <td>
                                            <a href="{{ route('admin.contact.messages.show', $message->id) }}"
                                                class="btn btn-sm btn-primary" title="View Message">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <form action="{{ route('admin.contact.messages.destroy', $message->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this message?')"
                                                    title="Delete Message">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="bi bi-inbox display-1 text-muted"></i>
                        <p class="text-muted mt-3">No contact messages found.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
