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
    
    .form-select {
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .form-control:focus,
    .form-select:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
    }
    
    .form-select option {
        padding: 0.5rem;
    }
    
    .btn-update {
        background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
        border: none;
        color: var(--primary-color);
        padding: 0.75rem 2.5rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-update:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        color: var(--primary-color);
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
    <h1><i class="fas fa-edit me-3"></i>Edit Borrowing Record</h1>
    <p class="text-muted mb-0">Update borrowing transaction details</p>
</div>

<div class="form-card">
    <form action="{{ route('borrowings.update', $borrowing->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="studentname" class="form-label">
                <i class="fas fa-user-graduate me-2"></i>Student Name *
            </label>
            <input type="text" id="studentname" name="studentname" value="{{ $borrowing->studentname }}" class="form-control" placeholder="Enter student name" required>
            @error('studentname')
                <div class="text-danger mt-1"><small>{{ $message }}</small></div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="bookname" class="form-label">
                <i class="fas fa-book me-2"></i>Book Name *
            </label>
            <select name="bookname" id="bookname" class="form-control form-select" required>
                <option value="">Select a book from catalog</option>
                @foreach($books as $book)
                    <option value="{{ $book->title }}" {{ $borrowing->bookname == $book->title ? 'selected' : '' }}>
                        {{ $book->title }} - {{ $book->author }}
                    </option>
                @endforeach
            </select>
            @error('bookname')
                <div class="text-danger mt-1"><small>{{ $message }}</small></div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="dateborrowed" class="form-label">
                <i class="fas fa-calendar-check me-2"></i>Date Borrowed *
            </label>
            <input type="date" id="dateborrowed" name="dateborrowed" value="{{ $borrowing->dateborrowed }}" class="form-control" required>
            @error('dateborrowed')
                <div class="text-danger mt-1"><small>{{ $message }}</small></div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="datereturn" class="form-label">
                <i class="fas fa-calendar-times me-2"></i>Return Date *
            </label>
            <input type="date" id="datereturn" name="datereturn" value="{{ $borrowing->datereturn }}" class="form-control" required>
            @error('datereturn')
                <div class="text-danger mt-1"><small>{{ $message }}</small></div>
            @enderror
        </div>

        <div class="d-flex gap-3 justify-content-end mt-5">
            <a href="{{ route('borrowings.index') }}" class="btn btn-cancel">
                <i class="fas fa-times me-2"></i>Cancel
            </a>
            <button type="submit" class="btn btn-update">
                <i class="fas fa-check me-2"></i>Update Record
            </button>
        </div>
    </form>
</div>
@endsection