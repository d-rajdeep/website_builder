@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit Contact Info</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('contact.update', $contact->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ $contact->address }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ $contact->phone }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $contact->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Google Map Link</label>
                        <textarea name="map_link" class="form-control">{{ $contact->map_link }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('contact.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
