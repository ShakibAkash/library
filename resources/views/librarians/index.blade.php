@extends('layout')

@section('styles')
<style>
    .librarian-table {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }
    
    .table thead {
        background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
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
    
    .btn-action {
        padding: 0.4rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-edit-librarian {
        background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        border: none;
        color: var(--primary-color);
    }
    
    .btn-edit-librarian:hover {
        transform: scale(1.05);
        color: var(--primary-color);
    }
    
    .btn-delete-librarian {
        background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
        border: none;
        color: var(--primary-color);
    }
    
    .btn-delete-librarian:hover {
        transform: scale(1.05);
        color: var(--primary-color);
    }

    /* Dark Mode Styles */
    body.dark-mode .librarian-table {
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

    body.dark-mode .btn-edit-librarian {
        background: linear-gradient(135deg, #8ab4f8 0%, #4285f4 100%);
        color: #ffffff;
    }

    body.dark-mode .btn-delete-librarian {
        background: linear-gradient(135deg, #ffa726 0%, #fb8c00 100%);
        color: #ffffff;
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
            <h1><i class="fas fa-user-tie me-3"></i>Library Staff</h1>
            <p class="text-muted mb-0">Manage librarian information and assignments</p>
        </div>
        <a href="{{ route('librarians.create') }}" class="btn btn-lg" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%); color: var(--primary-color); border: none; border-radius: 50px; padding: 0.75rem 2rem; font-weight: 600;">
            <i class="fas fa-user-plus me-2"></i>Add New Librarian
        </a>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>{{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="librarian-table">
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th><i class="fas fa-hashtag me-2"></i>ID</th>
                <th><i class="fas fa-user me-2"></i>Name</th>
                <th><i class="fas fa-envelope me-2"></i>Email</th>
                <th><i class="fas fa-phone me-2"></i>Phone</th>
                <th class="text-center"><i class="fas fa-cog me-2"></i>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($librarians as $librarian)
                <tr>
                    <td><strong>#{{ $librarian->id }}</strong></td>
                    <td>{{ $librarian->name }}</td>
                    <td>{{ $librarian->email }}</td>
                    <td>{{ $librarian->phone }}</td>
                    <td class="text-center">
                        <a href="{{ route('librarians.edit', $librarian->id) }}" class="btn btn-action btn-edit-librarian me-2">
                            <i class="fas fa-edit me-1"></i>Edit
                        </a>
                        <form action="{{ route('librarians.destroy', $librarian->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this librarian?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-action btn-delete-librarian">
                                <i class="fas fa-trash me-1"></i>Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-5">
                        <i class="fas fa-user-tie" style="font-size: 3rem; color: #ddd;"></i>
                        <p class="mt-3 text-muted">No librarians found</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection