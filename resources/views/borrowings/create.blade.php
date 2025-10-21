@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Add Borrowing</h2>
    <form action="{{ route('borrowings.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Student Name</label>
            <input type="text" name="studentname" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="bookname">Book Name</label>
            <input type="text" name="bookname" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="dateborrowed">Date Borrowed</label>
            <input type="date" name="dateborrowed" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="datereturn">Date Return</label>
            <input type="date" name="datereturn" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Save</button>
    </form>
</div>
@endsection
