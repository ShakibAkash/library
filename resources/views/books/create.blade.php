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
    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="title" class="form-label">
                    <i class="fas fa-book me-2"></i>Book Title *
                </label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter book title" required>
                @error('title')
                    <div class="text-danger mt-1"><small>{{ $message }}</small></div>
                @enderror
            </div>
            
            <div class="col-md-6 mb-4">
                <label for="author" class="form-label">
                    <i class="fas fa-user-edit me-2"></i>Author *
                </label>
                <input type="text" name="author" id="author" class="form-control" placeholder="Enter author name" required>
                @error('author')
                    <div class="text-danger mt-1"><small>{{ $message }}</small></div>
                @enderror
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="publisher" class="form-label">
                    <i class="fas fa-building me-2"></i>Publisher *
                </label>
                <input type="text" name="publisher" id="publisher" class="form-control" placeholder="Enter publisher name" required>
                @error('publisher')
                    <div class="text-danger mt-1"><small>{{ $message }}</small></div>
                @enderror
            </div>
            
            <div class="col-md-6 mb-4">
                <label for="genre" class="form-label">
                    <i class="fas fa-tag me-2"></i>Genre
                </label>
                <input type="text" name="genre" id="genre" class="form-control" placeholder="e.g., Fantasy, Comics, Manga">
                @error('genre')
                    <div class="text-danger mt-1"><small>{{ $message }}</small></div>
                @enderror
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="year" class="form-label">
                    <i class="fas fa-calendar me-2"></i>Publication Year
                </label>
                <input type="number" name="year" id="year" class="form-control" placeholder="e.g., 2023" min="1000" max="2100">
                @error('year')
                    <div class="text-danger mt-1"><small>{{ $message }}</small></div>
                @enderror
            </div>
            
            <div class="col-md-6 mb-4">
                <label for="rating" class="form-label">
                    <i class="fas fa-star me-2"></i>Rating (0-5)
                </label>
                <input type="number" step="0.1" name="rating" id="rating" class="form-control" placeholder="e.g., 4.5" min="0" max="5">
                @error('rating')
                    <div class="text-danger mt-1"><small>{{ $message }}</small></div>
                @enderror
            </div>
        </div>
        
        <div class="mb-4">
            <label for="cover_image" class="form-label">
                <i class="fas fa-upload me-2"></i>Upload Cover Image
            </label>
            <input type="file" name="cover_image" id="cover_image" class="form-control" accept="image/*">
            <small class="text-muted">Upload book cover image (JPEG, PNG, JPG, GIF, WEBP - Max 2MB)</small>
            @error('cover_image')
                <div class="text-danger mt-1"><small>{{ $message }}</small></div>
            @enderror
            <div id="imagePreview" class="mt-3" style="display:none;">
                <img id="preview" src="" alt="Preview" style="max-width: 200px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.2);">
            </div>
        </div>
        
        <div class="mb-4">
            <label for="status" class="form-label">
                <i class="fas fa-info-circle me-2"></i>Status
            </label>
            <select name="status" id="status" class="form-control">
                <option value="available">Available</option>
                <option value="borrowed">Borrowed</option>
                <option value="completed">Completed</option>
            </select>
            @error('status')
                <div class="text-danger mt-1"><small>{{ $message }}</small></div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="description" class="form-label">
                <i class="fas fa-align-left me-2"></i>Description
            </label>
            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter book description or summary"></textarea>
            @error('description')
                <div class="text-danger mt-1"><small>{{ $message }}</small></div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="notes" class="form-label">
                <i class="fas fa-sticky-note me-2"></i>Notes
            </label>
            <textarea name="notes" id="notes" class="form-control" rows="3" placeholder="Additional notes about the book"></textarea>
            @error('notes')
                <div class="text-danger mt-1"><small>{{ $message }}</small></div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="review" class="form-label">
                <i class="fas fa-star me-2"></i>Review
            </label>
            <textarea name="review" id="review" class="form-control" rows="3" placeholder="Your review of the book"></textarea>
            @error('review')
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

<script>
    // Image preview functionality
    document.getElementById('cover_image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
                document.getElementById('imagePreview').style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection