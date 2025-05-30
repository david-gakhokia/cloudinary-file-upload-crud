@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Create Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">SKU:</label>
            <input type="number" name="sku" value="{{ old('sku') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Price:</label>
            <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Quantity:</label>
            <input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description:</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Product Image:</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Save Product</button>
            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">← Back</a>
        </div>

    </form>
@endsection
