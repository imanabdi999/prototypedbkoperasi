@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Customer Details</h1>

    <div class="mb-3">
        <strong>Nama:</strong> {{ $customer->nama }}
    </div>
    <div class="mb-3">
        <strong>Email:</strong> {{ $customer->email }}
    </div>
    <div class="mb-3">
        <strong>Phone:</strong> {{ $customer->phone }}
    </div>
    <div class="mb-3">
        <strong>Alamat:</strong> {{ $customer->address ?? 'N/A' }}
    </div>

    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
