@extends('layouts.app')

@section('content')
    <div class="card shadow-sm p-4">
        <h1 class="mb-4">{{ $product->name }}</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            <div class="col-md-5 mb-3">
                @if ($product->image_url)
                    <img src="{{ $product->image_url }}" class="img-fluid rounded border" alt="Product Image">
                @else
                    <div class="text-muted">No image available.</div>
                @endif
            </div>

            <div class="col-md-7">
                <ul class="list-group mb-3">
                    <li class="list-group-item"><strong>SKU:</strong> {{ $product->sku }}</li>
                    <li class="list-group-item"><strong>Price:</strong> ${{ $product->price }}</li>
                    <li class="list-group-item"><strong>Quantity:</strong> {{ $product->quantity }}</li>
                    <li class="list-group-item"><strong>Status:</strong>
                        <span class="badge bg-{{ $product->status === 'active' ? 'success' : 'secondary' }}">
                            {{ ucfirst($product->status) }}
                        </span>
                    </li>
                    <li class="list-group-item"><strong>Rank:</strong> {{ $product->rank }}</li>
                </ul>

                <p><strong>Description:</strong><br>{{ $product->description }}</p>

                <div class="d-flex gap-2 mt-3">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">✏️ Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">🗑 Delete</button>
                    </form>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">← Back to list</a>
                </div>
            </div>
        </div>
    </div>
@endsection
