@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Manage Contact Information</h4>
                @if (!$contact)
                    <a href="{{ route('contact.create') }}" class="btn btn-light btn-sm">+ Add Contact Info</a>
                @endif
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($contact)
                    <table class="table table-bordered">
                        <tr>
                            <th>Address</th>
                            <td>{{ $contact->address }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $contact->phone }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <th>Map</th>
                            <td>
                                @if ($contact->map_link)
                                    <a href="{{ $contact->map_link }}" target="_blank" class="btn btn-sm btn-info">View
                                        Map</a>
                                @else
                                    <span class="text-muted">No Map Added</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                    <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-warning btn-sm">Edit</a>
                @else
                    <p class="text-muted">No contact info available yet.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
