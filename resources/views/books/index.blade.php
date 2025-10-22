@extends('layout')

@section('styles')
<style>
    .book-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        height: 100%;
        background: white;
    }
    
    .book-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
    }
    
    .book-cover-container {
        width: 100%;
        height: 320px;
        background: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        position: relative;
    }
    
    .book-cover-container img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        object-position: center;
    }
    
    .book-cover-placeholder {
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
        color: white;
    }
    
    .book-card .card-body {
        padding: 1.5rem;
    }
    
    .book-card .card-title {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        color: var(--primary-color);
        font-size: 1.3rem;
        margin-bottom: 0.5rem;
    }
    
    .book-meta {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 0.3rem;
    }
    
    .book-meta i {
        width: 20px;
        color: var(--accent-color);
    }
    
    .action-buttons {
        display: flex;
        gap: 0.5rem;
        margin-top: 1rem;
    }
    
    .btn-edit {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        border: none;
        color: white;
        flex: 1;
    }
    
    .btn-edit:hover {
        transform: scale(1.05);
        color: white;
    }
    
    .btn-delete {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        border: none;
        color: white;
        flex: 1;
    }
    
    .btn-delete:hover {
        transform: scale(1.05);
        color: white;
    }

    /* Dark Mode Styles */
    body.dark-mode .book-card {
        background-color: #3d3f52;
        box-shadow: 0 5px 20px rgba(0,0,0,0.3);
    }
    
    body.dark-mode .book-card .card-title {
        color: #ffffff;
    }
    
    body.dark-mode .book-meta {
        color: #c5c7ca;
    }
    
    body.dark-mode .book-cover-container {
        background: #2d3142;
    }

    body.dark-mode .book-table {
        background: #3d3f52;
        box-shadow: 0 5px 20px rgba(0,0,0,0.3);
    }

    body.dark-mode .table {
        color: #ffffff !important;
        background-color: #3d3f52 !important;
    }
    
    body.dark-mode .table tbody td,
    body.dark-mode .table tbody tr,
    body.dark-mode .table td,
    body.dark-mode .table th {
        color: #ffffff !important;
        background-color: transparent !important;
        border-color: #2d3142 !important;
    }

    body.dark-mode .table tbody tr:hover {
        background-color: rgba(255, 107, 107, 0.1) !important;
    }

    body.dark-mode .btn-edit {
        background: linear-gradient(135deg, #ff6b9d 0%, #c73866 100%);
    }

    body.dark-mode .btn-delete {
        background: linear-gradient(135deg, #ffa726 0%, #fb8c00 100%);
    }
    
    /* Empty State Dark Mode */
    body.dark-mode .empty-state {
        color: #c5c7ca;
    }
    
    body.dark-mode .empty-state svg,
    body.dark-mode .empty-state i {
        opacity: 0.5;
    }
</style>
```
@endsection

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1><i class="fas fa-book me-3"></i>Book Collection</h1>
            <p class="text-muted mb-0">Manage and organize your library's book inventory</p>
        </div>
        <a href="{{ route('books.create') }}" class="btn btn-lg" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: white; border: none; border-radius: 50px; padding: 0.75rem 2rem;">
            <i class="fas fa-plus-circle me-2"></i>Add New Book
        </a>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>{{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if($books->count() > 0)
    <div class="row g-4">
        @foreach ($books as $book)
            <div class="col-md-4 col-lg-3">
                <div class="book-card card">
                    <div class="book-cover-container">
                        @if($book->cover_url)
                            <img src="{{ asset($book->cover_url) }}" alt="{{ $book->title }}">
                        @else
                            <div class="book-cover-placeholder">
                                <i class="fas fa-book-open"></i>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <div class="book-meta">
                            <i class="fas fa-user"></i> {{ $book->author }}
                        </div>
                        <div class="book-meta">
                            <i class="fas fa-building"></i> {{ $book->publisher }}
                        </div>
                        <div class="action-buttons">
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-edit btn-sm">
                                <i class="fas fa-edit me-1"></i>Edit
                            </a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure you want to delete this book?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete btn-sm w-100">
                                    <i class="fas fa-trash me-1"></i>Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="text-center py-5">
        <i class="fas fa-book-open" style="font-size: 5rem; color: #ddd;"></i>
        <h3 class="mt-4 text-muted">No Books Found</h3>
        <p class="text-muted">Start by adding your first book to the library</p>
        <a href="{{ route('books.create') }}" class="btn btn-primary mt-3">
            <i class="fas fa-plus-circle me-2"></i>Add Your First Book
        </a>
    </div>
@endif
@endsection