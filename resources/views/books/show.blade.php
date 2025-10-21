@extends('layout')

@section('title', $book->title)

@section('styles')
<style>
    .book-detail-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 40px 0;
        margin-bottom: 40px;
        border-radius: 0 0 30px 30px;
    }

    .action-bar {
        display: flex;
        gap: 15px;
        justify-content: flex-end;
        margin-bottom: 30px;
        flex-wrap: wrap;
    }

    .action-btn {
        padding: 10px 25px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: none;
        cursor: pointer;
    }

    .btn-edit {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .btn-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        color: white;
    }

    .btn-delete {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
    }

    .btn-delete:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(245, 87, 108, 0.4);
        color: white;
    }

    .btn-back {
        background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        color: #2c3e50;
    }

    .btn-back:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(168, 237, 234, 0.4);
        color: #2c3e50;
    }

    .book-detail-container {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
        margin-bottom: 40px;
    }

    .book-main-info {
        display: grid;
        grid-template-columns: 300px 1fr;
        gap: 40px;
        padding: 40px;
    }

    @media (max-width: 768px) {
        .book-main-info {
            grid-template-columns: 1fr;
        }
    }

    .book-cover-section {
        text-align: center;
    }

    .book-cover-large {
        width: 100%;
        max-width: 300px;
        height: 450px;
        object-fit: contain;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        margin-bottom: 20px;
        display: block;
        background: #f8f9fa;
    }

    .book-status {
        display: inline-block;
        padding: 8px 20px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 14px;
        margin-top: 10px;
    }

    .status-available {
        background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
        color: #2c3e50;
    }

    .status-borrowed {
        background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
        color: #2c3e50;
    }

    .status-completed {
        background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%);
        color: #2c3e50;
    }

    .book-info-section h1 {
        font-size: 32px;
        color: #2c3e50;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .book-author-name {
        font-size: 18px;
        color: #7f8c8d;
        margin-bottom: 20px;
    }

    .book-rating-display {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
        padding: 8px 20px;
        border-radius: 20px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .book-meta-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-top: 30px;
    }

    .meta-item {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 10px;
        border-left: 4px solid #667eea;
    }

    .meta-label {
        font-size: 12px;
        color: #7f8c8d;
        text-transform: uppercase;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .meta-value {
        font-size: 16px;
        color: #2c3e50;
        font-weight: 600;
    }

    .tabs-container {
        margin-top: 40px;
    }

    .nav-tabs {
        border-bottom: 3px solid #667eea;
        margin-bottom: 30px;
    }

    .nav-tabs .nav-link {
        border: none;
        color: #7f8c8d;
        font-weight: 600;
        padding: 15px 30px;
        transition: all 0.3s;
        position: relative;
    }

    .nav-tabs .nav-link:hover {
        color: #667eea;
        background: transparent;
    }

    .nav-tabs .nav-link.active {
        color: #667eea;
        background: transparent;
        border: none;
    }

    .nav-tabs .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -3px;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 3px 3px 0 0;
    }

    .tab-content {
        padding: 30px;
        background: #f8f9fa;
        border-radius: 15px;
        min-height: 200px;
    }

    .tab-pane h3 {
        color: #667eea;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .tab-pane p {
        color: #2c3e50;
        line-height: 1.8;
        font-size: 16px;
    }

    .empty-content {
        text-align: center;
        padding: 40px;
        color: #7f8c8d;
    }

    .empty-content i {
        font-size: 60px;
        margin-bottom: 15px;
        color: #bdc3c7;
    }
</style>
@endsection

@section('content')
<div class="book-detail-header">
    <div class="container">
        <h1 class="text-center">
            <i class="fas fa-book-open me-2"></i>Book Details
        </h1>
    </div>
</div>

<div class="container">
    <!-- Action Bar -->
    <div class="action-bar">
        <a href="{{ route('books.catalog') }}" class="action-btn btn-back">
            <i class="fas fa-arrow-left"></i>Back to Catalog
        </a>
        <a href="{{ route('books.edit', $book->id) }}" class="action-btn btn-edit">
            <i class="fas fa-edit"></i>Edit
        </a>
        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline;" 
              onsubmit="return confirm('Are you sure you want to delete this book?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="action-btn btn-delete">
                <i class="fas fa-trash-alt"></i>Delete
            </button>
        </form>
    </div>

    <!-- Book Detail Container -->
    <div class="book-detail-container">
        <div class="book-main-info">
            <!-- Cover Section -->
            <div class="book-cover-section">
                <img src="{{ $book->cover_url ? (strpos($book->cover_url, 'http') === 0 ? $book->cover_url : asset($book->cover_url)) : 'https://via.placeholder.com/300x400?text=No+Cover' }}" 
                     alt="{{ $book->title }}" 
                     class="book-cover-large">
                <div class="book-status status-{{ $book->status ?? 'available' }}">
                    @if($book->status == 'available')
                        <i class="fas fa-check-circle"></i> Available
                    @elseif($book->status == 'borrowed')
                        <i class="fas fa-clock"></i> Borrowed
                    @else
                        <i class="fas fa-book"></i> {{ ucfirst($book->status ?? 'Available') }}
                    @endif
                </div>
            </div>

            <!-- Info Section -->
            <div class="book-info-section">
                <h1>{{ $book->title }}</h1>
                <div class="book-author-name">
                    <i class="fas fa-user me-2"></i>by {{ $book->author }}
                </div>
                
                @if($book->rating)
                    <div class="book-rating-display">
                        <i class="fas fa-star"></i>
                        {{ number_format($book->rating, 1) }} / 5.0
                    </div>
                @endif

                <!-- Meta Information Grid -->
                <div class="book-meta-grid">
                    @if($book->publisher)
                        <div class="meta-item">
                            <div class="meta-label">
                                <i class="fas fa-building me-1"></i>Publisher
                            </div>
                            <div class="meta-value">{{ $book->publisher }}</div>
                        </div>
                    @endif

                    @if($book->year)
                        <div class="meta-item">
                            <div class="meta-label">
                                <i class="fas fa-calendar me-1"></i>Year
                            </div>
                            <div class="meta-value">{{ $book->year }}</div>
                        </div>
                    @endif

                    @if($book->genre)
                        <div class="meta-item">
                            <div class="meta-label">
                                <i class="fas fa-tag me-1"></i>Genre
                            </div>
                            <div class="meta-value">{{ $book->genre }}</div>
                        </div>
                    @endif

                    @if($book->pages)
                        <div class="meta-item">
                            <div class="meta-label">
                                <i class="fas fa-file-alt me-1"></i>Pages
                            </div>
                            <div class="meta-value">{{ $book->pages }}</div>
                        </div>
                    @endif

                    @if($book->isbn)
                        <div class="meta-item">
                            <div class="meta-label">
                                <i class="fas fa-barcode me-1"></i>ISBN
                            </div>
                            <div class="meta-value">{{ $book->isbn }}</div>
                        </div>
                    @endif

                    <div class="meta-item">
                        <div class="meta-label">
                            <i class="fas fa-info-circle me-1"></i>Status
                        </div>
                        <div class="meta-value">{{ ucfirst($book->status ?? 'Available') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs Section -->
        <div class="tabs-container">
            <ul class="nav nav-tabs" id="bookTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab" 
                            data-bs-target="#description" type="button" role="tab">
                        <i class="fas fa-align-left me-2"></i>Description
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="notes-tab" data-bs-toggle="tab" 
                            data-bs-target="#notes" type="button" role="tab">
                        <i class="fas fa-sticky-note me-2"></i>Notes
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="review-tab" data-bs-toggle="tab" 
                            data-bs-target="#review" type="button" role="tab">
                        <i class="fas fa-star me-2"></i>Review
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="bookTabsContent">
                <!-- Description Tab -->
                <div class="tab-pane fade show active" id="description" role="tabpanel">
                    @if($book->description)
                        <h3>About This Book</h3>
                        <p>{{ $book->description }}</p>
                    @else
                        <div class="empty-content">
                            <i class="fas fa-book-open"></i>
                            <p>No description available for this book.</p>
                        </div>
                    @endif
                </div>

                <!-- Notes Tab -->
                <div class="tab-pane fade" id="notes" role="tabpanel">
                    @if($book->notes)
                        <h3>Notes</h3>
                        <p>{{ $book->notes }}</p>
                    @else
                        <div class="empty-content">
                            <i class="fas fa-sticky-note"></i>
                            <p>No notes available for this book.</p>
                        </div>
                    @endif
                </div>

                <!-- Review Tab -->
                <div class="tab-pane fade" id="review" role="tabpanel">
                    @if($book->review)
                        <h3>Review</h3>
                        <p>{{ $book->review }}</p>
                    @else
                        <div class="empty-content">
                            <i class="fas fa-star"></i>
                            <p>No review available for this book.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
