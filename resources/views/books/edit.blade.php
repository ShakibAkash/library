@extends('layout')

@section('styles')
<style>
    .form-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        padding: 2.5rem;
        max-width: 800px;
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
    
    .btn-update {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        border: none;
        color: white;
        padding: 0.75rem 2.5rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-update:hover {
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
    
    .current-cover {
        max-width: 200px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <h1><i class="fas fa-edit me-3"></i>Edit Book</h1>
    <p class="text-muted mb-0">Update the book information below</p>
</div>

<div class="form-card">
    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="title" class="form-label">
                    <i class="fas fa-book me-2"></i>Book Title *
                </label>
                <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" class="form-control" placeholder="Enter book title" required>
                @error('title')
                    <div class="text-danger mt-1"><small>{{ $message }}</small></div>
                @enderror
            </div>

            <div class="col-md-6 mb-4">
                <label for="author" class="form-label">
                    <i class="fas fa-user-edit me-2"></i>Author *
                </label>
                <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}" class="form-control" placeholder="Enter author name" required>
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
                <input type="text" id="publisher" name="publisher" value="{{ old('publisher', $book->publisher) }}" class="form-control" placeholder="Enter publisher name" required>
                @error('publisher')
                    <div class="text-danger mt-1"><small>{{ $message }}</small></div>
                @enderror
            </div>
            
            <div class="col-md-6 mb-4">
                <label for="genre" class="form-label">
                    <i class="fas fa-tag me-2"></i>Genre
                </label>
                <input type="text" name="genre" id="genre" value="{{ old('genre', $book->genre) }}" class="form-control" placeholder="e.g., Fantasy, Comics, Manga">
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
                <input type="number" name="year" id="year" value="{{ old('year', $book->year) }}" class="form-control" placeholder="e.g., 2023" min="1000" max="2100">
                @error('year')
                    <div class="text-danger mt-1"><small>{{ $message }}</small></div>
                @enderror
            </div>
            
            <div class="col-md-6 mb-4">
                <label for="rating" class="form-label">
                    <i class="fas fa-star me-2"></i>Rating (0-5)
                </label>
                <input type="number" step="0.1" name="rating" id="rating" value="{{ old('rating', $book->rating) }}" class="form-control" placeholder="e.g., 4.5" min="0" max="5">
                @error('rating')
                    <div class="text-danger mt-1"><small>{{ $message }}</small></div>
                @enderror
            </div>
        </div>

        <!-- Current Cover Image -->
        @if($book->cover_url)
        <div class="mb-4">
            <label class="form-label">
                <i class="fas fa-image me-2"></i>Current Cover Image
            </label>
            <div>
                @if(strpos($book->cover_url, 'http') === 0)
                    <img src="{{ $book->cover_url }}" alt="{{ $book->title }}" class="current-cover">
                @else
                    <img src="{{ asset($book->cover_url) }}" alt="{{ $book->title }}" class="current-cover">
                @endif
            </div>
        </div>
        @endif

        <!-- Upload New Cover Image -->
        <div class="mb-4">
            <label for="cover_image" class="form-label">
                <i class="fas fa-upload me-2"></i>Upload New Cover Image
            </label>
            <input type="file" name="cover_image" id="cover_image" class="form-control" accept="image/*">
            <small class="text-muted">Upload book cover image (JPEG, PNG, JPG, GIF, WEBP - Max 2MB) - Leave empty to keep current image</small>
            @error('cover_image')
                <div class="text-danger mt-1"><small>{{ $message }}</small></div>
            @enderror
            <div id="imagePreview" class="mt-3" style="display:none;">
                <img id="preview" src="" alt="Preview" style="max-width: 200px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.2);">
            </div>
        </div>

        <!-- Cover Image URL -->
        <div class="mb-4">
            <label class="form-label">
                <i class="fas fa-link me-2"></i>OR Enter Cover Image URL
            </label>
            <input type="url" name="cover_url" id="cover_url" value="{{ old('cover_url', $book->cover_url) }}" class="form-control" placeholder="https://example.com/book-cover.jpg">
            <small class="text-muted">If you don't upload an image, you can paste a direct URL instead</small>
            @error('cover_url')
                <div class="text-danger mt-1"><small>{{ $message }}</small></div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="status" class="form-label">
                <i class="fas fa-info-circle me-2"></i>Status
            </label>
            <select name="status" id="status" class="form-control">
                <option value="available" {{ old('status', $book->status) == 'available' ? 'selected' : '' }}>Available</option>
                <option value="borrowed" {{ old('status', $book->status) == 'borrowed' ? 'selected' : '' }}>Borrowed</option>
                <option value="completed" {{ old('status', $book->status) == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
            @error('status')
                <div class="text-danger mt-1"><small>{{ $message }}</small></div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="form-label">
                <i class="fas fa-align-left me-2"></i>Description
            </label>
            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter book description or summary">{{ old('description', $book->description) }}</textarea>
            @error('description')
                <div class="text-danger mt-1"><small>{{ $message }}</small></div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="notes" class="form-label">
                <i class="fas fa-sticky-note me-2"></i>Notes
            </label>
            <textarea name="notes" id="notes" class="form-control" rows="3" placeholder="Additional notes about the book">{{ old('notes', $book->notes) }}</textarea>
            @error('notes')
                <div class="text-danger mt-1"><small>{{ $message }}</small></div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="review" class="form-label">
                <i class="fas fa-star me-2"></i>Review
            </label>
            <textarea name="review" id="review" class="form-control" rows="3" placeholder="Your review of the book">{{ old('review', $book->review) }}</textarea>
            @error('review')
                <div class="text-danger mt-1"><small>{{ $message }}</small></div>
            @enderror
        </div>

        <div class="d-flex gap-3 justify-content-end mt-5">
            <a href="{{ route('books.show', $book->id) }}" class="btn btn-cancel">
                <i class="fas fa-times me-2"></i>Cancel
            </a>
            <button type="submit" class="btn btn-update">
                <i class="fas fa-check me-2"></i>Update Book
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
