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
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
    <h1><i class="fas fa-user-plus me-3"></i>Add New Student</h1>
    <p class="text-muted mb-0">Register a new student in the library system</p>
</div>

<div class="form-card">
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="studentname" class="form-label">
                <i class="fas fa-user me-2"></i>Student Name *
            </label>
            <input type="text" name="studentname" id="studentname" class="form-control" placeholder="Enter student name" required>
            @error('studentname')
                <div class="text-danger mt-1"><small>{{ $message }}</small></div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="email" class="form-label">
                <i class="fas fa-envelope me-2"></i>Email Address *
            </label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter email address" required>
            @error('email')
                <div class="text-danger mt-1"><small>{{ $message }}</small></div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="phone" class="form-label">
                <i class="fas fa-phone me-2"></i>Phone Number *
            </label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter phone number" required>
            @error('phone')
                <div class="text-danger mt-1"><small>{{ $message }}</small></div>
            @enderror
        </div>
        
        <div class="d-flex gap-3 justify-content-end mt-5">
            <a href="{{ route('students.index') }}" class="btn btn-cancel">
                <i class="fas fa-times me-2"></i>Cancel
            </a>
            <button type="submit" class="btn btn-submit">
                <i class="fas fa-save me-2"></i>Save Student
            </button>
        </div>
    </form>
</div>
@endsection