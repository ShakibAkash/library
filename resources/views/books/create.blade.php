@extends('layout')

@section('styles')
<style>
    .form-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        padding: 2.5rem;
        max-width: 700px;
        margin: 0 auto;
    }
    
    .form-label {
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
    }
    
    .form-control {
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
    }
    
    .btn-submit {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        border: none;
        color: white;
        padding: 0.75rem 2.5rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        color: white;
    }
    
    .btn-cancel {
        border: 2px solid #6c757d;
        color: #6c757d;
        padding: 0.75rem 2.5rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-cancel:hover {
        background: #6c757d;
        color: white;
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <h1><i class="fas fa-plus-circle me-3"></i>Add New Book</h1>
    <p class="text-muted mb-0">Fill in the details to add a new book to the library</p>
</div>

<div class="form-card">
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="title" class="form-label">
                <i class="fas fa-book me-2"></i>Book Title *
            </label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter book title" required>
            @error('title')
                <div class="text-danger mt-1"><small>{{ $message }}</small></div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="author" class="form-label">
                <i class="fas fa-user-edit me-2"></i>Author *
            </label>
            <input type="text" name="author" id="author" class="form-control" placeholder="Enter author name" required>
            @error('author')
                <div class="text-danger mt-1"><small>{{ $message }}</small></div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="publisher" class="form-label">
                <i class="fas fa-building me-2"></i>Publisher *
            </label>
            <input type="text" name="publisher" id="publisher" class="form-control" placeholder="Enter publisher name" required>
            @error('publisher')
                <div class="text-danger mt-1"><small>{{ $message }}</small></div>
            @enderror
        </div>
        
        <div class="d-flex gap-3 justify-content-end mt-5">
            <a href="{{ route('books.index') }}" class="btn btn-cancel">
                <i class="fas fa-times me-2"></i>Cancel
            </a>
            <button type="submit" class="btn btn-submit">
                <i class="fas fa-save me-2"></i>Save Book
            </button>
        </div>
    </form>
</div>
@endsection