@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Edit Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
        class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">SKU:</label>
            <input type="number" name="sku" value="{{ old('sku', $product->sku) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Price:</label>
            <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}"
                class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Quantity:</label>
            <input type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}" class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description:</label>
            <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Change Image:</label>
            <input type="file" name="image" class="form-control">
            @if ($product->image_url)
                <div class="mt-2">
                    <img src="{{ $product->image_url }}" width="120" class="img-thumbnail">
                </div>
            @endif
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">💾 Update</button>
            <a href="{{ route('products.show', $product->id) }}" class="btn btn-secondary">← Cancel</a>
        </div>
    </form>
@endsection
