<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product CRUD with Cloudinary – Laravel 12</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="text-center mb-4">
            <h1 class="fw-bold">Welcome to Product Manager</h1>
            <p class="text-muted">Simple Laravel CRUD using Cloudinary</p>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5 class="card-title">👤 Project by</h5>
                <p class="card-text mb-1"><strong>David Gakhokia</strong></p>
                <p class="text-muted small">Laravel Developer • Georgia</p>
                <p class="text-muted small mb-0">Email: <a href="mailto:david@example.com">david@example.com</a></p>
                <p class="text-muted small">GitHub: <a href="https://github.com/yourusername" target="_blank">github.com/yourusername</a></p>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('products.index') }}" class="btn btn-primary px-4">➡ Go to Product Panel</a>
        </div>
    </div>

</body>
</html>
