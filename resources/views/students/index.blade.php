@extends('layout')

@section('styles')
<style>
    .student-table {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }
    
    .table thead {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
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
    
    .btn-edit-student {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        border: none;
        color: white;
    }
    
    .btn-edit-student:hover {
        transform: scale(1.05);
        color: white;
    }
    
    .btn-delete-student {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        border: none;
        color: white;
    }
    
    .btn-delete-student:hover {
        transform: scale(1.05);
        color: white;
    }

    /* Dark Mode Styles */
    body.dark-mode .student-table {
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

    body.dark-mode .btn-edit-student {
        background: linear-gradient(135deg, #ff6b9d 0%, #c73866 100%);
    }

    body.dark-mode .btn-delete-student {
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
            <h1><i class="fas fa-user-graduate me-3"></i>Student Records</h1>
            <p class="text-muted mb-0">Manage student information and profiles</p>
        </div>
        <a href="{{ route('students.create') }}" class="btn btn-lg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; border-radius: 50px; padding: 0.75rem 2rem;">
            <i class="fas fa-user-plus me-2"></i>Add New Student
        </a>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>{{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="student-table">
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th><i class="fas fa-hashtag me-2"></i>ID</th>
                <th><i class="fas fa-user me-2"></i>Student Name</th>
                <th><i class="fas fa-envelope me-2"></i>Email</th>
                <th><i class="fas fa-phone me-2"></i>Phone</th>
                <th class="text-center"><i class="fas fa-cog me-2"></i>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr>
                    <td><strong>#{{ $student->id }}</strong></td>
                    <td>{{ $student->studentname }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td class="text-center">
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-action btn-edit-student me-2">
                            <i class="fas fa-edit me-1"></i>Edit
                        </a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this student?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-action btn-delete-student">
                                <i class="fas fa-trash me-1"></i>Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-5">
                        <i class="fas fa-user-graduate" style="font-size: 3rem; color: #ddd;"></i>
                        <p class="mt-3 text-muted">No students found</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection