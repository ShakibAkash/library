@extends('layout')

@section('title', 'Book Catalog')

@section('styles')
<style>
    .catalog-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 60px 0 40px;
        margin-bottom: 40px;
        border-radius: 0 0 30px 30px;
    }

    .search-container {
        max-width: 600px;
        margin: 0 auto;
    }

    .search-box {
        position: relative;
    }

    .search-box input {
        padding: 15px 50px 15px 20px;
        border-radius: 50px;
        border: none;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        font-size: 16px;
        width: 100%;
    }

    .search-box button {
        position: absolute;
        right: 5px;
        top: 5px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
        padding: 10px 25px;
        border-radius: 50px;
        cursor: pointer;
        transition: transform 0.3s;
    }

    .search-box button:hover {
        transform: scale(1.05);
    }

    .alphabet-nav {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
        margin: 30px 0;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 15px;
    }

    .alphabet-nav a {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        color: #667eea;
        text-decoration: none;
        border-radius: 50%;
        font-weight: bold;
        transition: all 0.3s;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .alphabet-nav a:hover {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        transform: scale(1.1);
    }

    .book-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 30px;
        margin-top: 30px;
    }

    .book-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: all 0.3s;
        cursor: pointer;
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .book-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    .book-cover {
        width: 100%;
        height: 320px;
        object-fit: contain;
        display: block;
        background: #f8f9fa;
    }
    
    .book-cover.error {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 48px;
    }
    
    .book-cover.error::before {
        content: '📚';
        font-size: 80px;
    }
    
    .fallback-cover {
        width: 100%;
        height: 320px;
    }

    .book-info {
        padding: 20px;
    }

    .book-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 8px;
        color: #2c3e50;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .book-author {
        color: #7f8c8d;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .book-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #ecf0f1;
    }

    .book-genre {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .book-rating {
        color: #f39c12;
        font-weight: bold;
    }

    .no-books {
        text-align: center;
        padding: 60px 20px;
        color: #7f8c8d;
    }

    .no-books i {
        font-size: 80px;
        margin-bottom: 20px;
        color: #bdc3c7;
    }

    .letter-section {
        margin-top: 40px;
    }

    .letter-header {
        font-size: 36px;
        font-weight: bold;
        color: #667eea;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 3px solid #667eea;
    }

    .stats-bar {
        display: flex;
        justify-content: center;
        gap: 40px;
        margin-top: 20px;
        flex-wrap: wrap;
    }

    .stat-item {
        text-align: center;
    }

    .stat-number {
        font-size: 32px;
        font-weight: bold;
        color: white;
    }

    .stat-label {
        font-size: 14px;
        opacity: 0.9;
    }

    /* Dark Mode Styles */
    body.dark-mode .book-card {
        background: #3d3f52;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    body.dark-mode .book-card:hover {
        box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    }

    body.dark-mode .book-title {
        color: #ffffff;
    }

    body.dark-mode .book-author {
        color: #c5c7ca;
    }

    body.dark-mode .book-genre {
        background: rgba(255, 107, 107, 0.2);
        color: #ff6b6b;
    }

    body.dark-mode .book-rating {
        color: #ffa726;
    }

    body.dark-mode .alphabet-nav {
        background: #3d3f52;
    }

    body.dark-mode .alphabet-nav a {
        background: #2d3142;
        color: #ff6b6b;
    }

    body.dark-mode .alphabet-nav a:hover {
        background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);
        color: white;
    }

    body.dark-mode .alphabet-nav a.active {
        background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);
        color: white;
    }

    body.dark-mode .letter-header {
        color: #ffffff;
        border-bottom-color: #ff6b6b;
    }

    body.dark-mode .book-cover {
        background: #2d3142;
    }
</style>
```
@endsection

@section('content')
<div class="catalog-header">
    <div class="container">
        <h1 class="text-center mb-4">
            <i class="fas fa-book-open me-2"></i>Book Catalog
        </h1>
        <p class="text-center mb-4">Explore our extensive collection of books</p>
        
        <div class="search-container">
            <form action="{{ route('books.catalog') }}" method="GET">
                <div class="search-box">
                    <input 
                        type="text" 
                        name="search" 
                        placeholder="Search by title, author, or genre..." 
                        value="{{ request('search') }}"
                    >
                    <button type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <div class="stats-bar">
            <div class="stat-item">
                <div class="stat-number">{{ $books->count() }}</div>
                <div class="stat-label">Books Available</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">{{ $books->unique('author')->count() }}</div>
                <div class="stat-label">Authors</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">{{ $books->unique('genre')->count() }}</div>
                <div class="stat-label">Genres</div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    @if($books->isEmpty())
        <div class="no-books">
            <i class="fas fa-book-open"></i>
            <h3>No books found</h3>
            <p>Try adjusting your search criteria</p>
        </div>
    @else
        <!-- Show books in grid without letter grouping -->
        @if(!request('letter'))
            <div class="book-grid">
                @foreach($books as $book)
                    <a href="{{ route('books.show', $book->id) }}" class="book-card">
                        @if($book->cover_url)
                            <img src="{{ strpos($book->cover_url, 'http') === 0 ? $book->cover_url : asset($book->cover_url) }}" 
                                 alt="{{ $book->title }}" 
                                 class="book-cover"
                                 onerror="this.onerror=null; this.style.display='none'; this.parentElement.querySelector('.fallback-cover').style.display='flex';">
                            <div class="book-cover fallback-cover error" style="display:none;">
                                <i class="fas fa-book"></i>
                            </div>
                        @else
                            <div class="book-cover error">
                                <i class="fas fa-book"></i>
                            </div>
                        @endif
                        <div class="book-info">
                            <div class="book-title">{{ $book->title }}</div>
                            <div class="book-author">
                                <i class="fas fa-user me-1"></i>{{ $book->author }}
                            </div>
                            <div class="book-meta">
                                <span class="book-genre">{{ $book->genre ?? 'General' }}</span>
                                <span class="book-rating">
                                    <i class="fas fa-star"></i> {{ number_format($book->rating ?? 0, 1) }}
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <!-- Show books grouped by letter when letter filter is active -->
            @php
                $booksByLetter = $books->groupBy(function($book) {
                    return strtoupper(substr($book->title, 0, 1));
                })->sortKeys();
            @endphp

            @foreach($booksByLetter as $letter => $letterBooks)
                <div class="letter-section" id="letter-{{ $letter }}">
                    <div class="letter-header">{{ $letter }}</div>
                    <div class="book-grid">
                        @foreach($letterBooks as $book)
                            <a href="{{ route('books.show', $book->id) }}" class="book-card">
                                @if($book->cover_url)
                                    <img src="{{ strpos($book->cover_url, 'http') === 0 ? $book->cover_url : asset($book->cover_url) }}" 
                                         alt="{{ $book->title }}" 
                                         class="book-cover"
                                         onerror="this.onerror=null; this.style.display='none'; this.parentElement.querySelector('.fallback-cover').style.display='flex';">
                                    <div class="book-cover fallback-cover error" style="display:none;">
                                        <i class="fas fa-book"></i>
                                    </div>
                                @else
                                    <div class="book-cover error">
                                        <i class="fas fa-book"></i>
                                    </div>
                                @endif
                                <div class="book-info">
                                    <div class="book-title">{{ $book->title }}</div>
                                    <div class="book-author">
                                        <i class="fas fa-user me-1"></i>{{ $book->author }}
                                    </div>
                                    <div class="book-meta">
                                        <span class="book-genre">{{ $book->genre ?? 'General' }}</span>
                                        <span class="book-rating">
                                            <i class="fas fa-star"></i> {{ number_format($book->rating ?? 0, 1) }}
                                        </span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif

        <!-- Alphabet Navigation at Bottom -->
        <div style="margin-top: 60px; margin-bottom: 40px;">
            <h4 class="text-center mb-3" style="color: #667eea; font-weight: bold;">Browse by Letter</h4>
            <div class="alphabet-nav">
                <a href="{{ route('books.catalog') }}" style="width: auto; padding: 0 15px; background: {{ !request('letter') ? 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)' : 'white' }}; color: {{ !request('letter') ? 'white' : '#667eea' }};">All</a>
                @foreach(range('A', 'Z') as $letter)
                    <a href="{{ route('books.catalog', ['letter' => $letter]) }}" style="background: {{ request('letter') == $letter ? 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)' : 'white' }}; color: {{ request('letter') == $letter ? 'white' : '#667eea' }};">{{ $letter }}</a>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
