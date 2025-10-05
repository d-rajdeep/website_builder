@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Message Details</h3>
                        <a href="{{ route('admin.contact.messages') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Messages
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Sender Information</h5>
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="30%">Name:</th>
                                        <td>{{ $contactMessage->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td>
                                            <a href="mailto:{{ $contactMessage->email }}">{{ $contactMessage->email }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Mobile:</th>
                                        <td>{{ $contactMessage->mobile }}</td>
                                    </tr>
                                    <tr>
                                        <th>Received:</th>
                                        <td>{{ $contactMessage->created_at->format('M j, Y g:i A') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status:</th>
                                        <td>
                                            @if ($contactMessage->isRead())
                                                <span class="badge bg-success">Read</span>
                                            @else
                                                <span class="badge bg-warning">Unread</span>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h5>Message Details</h5>
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="30%">Subject:</th>
                                        <td>{{ $contactMessage->subject }}</td>
                                    </tr>
                                    <tr>
                                        <th>Message:</th>
                                        <td style="white-space: pre-wrap;">{{ $contactMessage->message }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('admin.contact.destroy', $contactMessage) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this message?')">
                                <i class="fas fa-trash"></i> Delete Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
