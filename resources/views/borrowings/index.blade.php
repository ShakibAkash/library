@extends('layout')

@section('styles')
<style>
    .borrowing-table {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }
    
    .table thead {
        background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
        color: var(--primary-color);
    }
    
    .table thead th {
        border: none;
        padding: 1rem;
        font-weight: 600;
        letter-spacing: 0.5px;
    }
    
    .table tbody tr {
        transition: all 0.3s ease;
    }
    
    .table tbody tr:hover {
        background-color: #f8f9fa;
        transform: scale(1.01);
    }
    
    .table tbody td {
        padding: 1rem;
        vertical-align: middle;
    }
    
    .badge-date {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.85rem;
    }
    
    .badge-borrowed {
        background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        color: var(--primary-color);
    }
    
    .badge-return {
        background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
        color: var(--primary-color);
    }
    
    .btn-action {
        padding: 0.4rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-edit-borrowing {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        border: none;
        color: white;
    }
    
    .btn-edit-borrowing:hover {
        transform: scale(1.05);
        color: white;
    }
    
    .btn-delete-borrowing {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        border: none;
        color: white;
    }
    
    .btn-delete-borrowing:hover {
        transform: scale(1.05);
        color: white;
    }

    /* Dark Mode Styles */
    body.dark-mode .borrowing-table {
        background: #3d3f52;
        box-shadow: 0 5px 20px rgba(0,0,0,0.3);
    }

    body.dark-mode .table {
        color: #ffffff;
    }

    body.dark-mode .table tbody tr:hover {
        background-color: rgba(255, 107, 107, 0.1);
    }

    body.dark-mode .table tbody td {
        border-color: #2d3142;
    }

    body.dark-mode .btn-edit-borrowing {
        background: linear-gradient(135deg, #8ab4f8 0%, #4285f4 100%);
    }

    body.dark-mode .btn-delete-borrowing {
        background: linear-gradient(135deg, #ffa726 0%, #fb8c00 100%);
    }
    
    /* Badge Dark Mode */
    body.dark-mode .badge {
        opacity: 0.9;
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
            <h1><i class="fas fa-exchange-alt me-3"></i>Borrowing Records</h1>
            <p class="text-muted mb-0">Track book borrowing and return schedules</p>
        </div>
        <a href="{{ route('borrowings.create') }}" class="btn btn-lg" style="background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%); color: var(--primary-color); border: none; border-radius: 50px; padding: 0.75rem 2rem; font-weight: 600;">
            <i class="fas fa-plus-circle me-2"></i>New Borrowing
        </a>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>{{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="borrowing-table">
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th><i class="fas fa-hashtag me-2"></i>ID</th>
                <th><i class="fas fa-user-graduate me-2"></i>Student Name</th>
                <th><i class="fas fa-book me-2"></i>Book Name</th>
                <th><i class="fas fa-calendar-check me-2"></i>Date Borrowed</th>
                <th><i class="fas fa-calendar-times me-2"></i>Date Return</th>
                <th class="text-center"><i class="fas fa-cog me-2"></i>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($borrowings as $borrowing)
                <tr>
                    <td><strong>#{{ $borrowing->id }}</strong></td>
                    <td>{{ $borrowing->studentname }}</td>
                    <td>{{ $borrowing->bookname }}</td>
                    <td><span class="badge-date badge-borrowed">{{ \Carbon\Carbon::parse($borrowing->dateborrowed)->format('M d, Y') }}</span></td>
                    <td><span class="badge-date badge-return">{{ \Carbon\Carbon::parse($borrowing->datereturn)->format('M d, Y') }}</span></td>
                    <td class="text-center">
                        <a href="{{ route('borrowings.edit', $borrowing->id) }}" class="btn btn-action btn-edit-borrowing me-2">
                            <i class="fas fa-edit me-1"></i>Edit
                        </a>
                        <form action="{{ route('borrowings.destroy', $borrowing->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this borrowing record?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-action btn-delete-borrowing">
                                <i class="fas fa-trash me-1"></i>Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <i class="fas fa-exchange-alt" style="font-size: 3rem; color: #ddd;"></i>
                        <p class="mt-3 text-muted">No borrowing records found</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection