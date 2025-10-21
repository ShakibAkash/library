<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Library Management System</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #8b4513;
            --accent-color: #d4af37;
            --light-bg: #f8f9fa;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
        }
        
        .navbar {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%) !important;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            padding: 1rem 0;
        }
        
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.6rem;
            letter-spacing: 1px;
        }
        
        .nav-link {
            font-weight: 500;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav-link:hover {
            transform: translateY(-2px);
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--accent-color);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        .nav-link:hover::after {
            width: 80%;
        }
        
        .banner {
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset("images/librarybanner.jpg") }}') no-repeat center center;
            background-size: cover;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        
        .banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(30, 60, 114, 0.7), rgba(139, 69, 19, 0.5));
        }
        
        .banner-content {
            position: relative;
            z-index: 1;
            text-align: center;
            color: white;
            padding: 2rem;
        }
        
        .banner-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.5);
            animation: fadeInUp 1s ease;
        }
        
        .banner-content p {
            font-size: 1.4rem;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 4px rgba(0,0,0,0.5);
            animation: fadeInUp 1s ease 0.3s backwards;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .feature-card {
            height: 100%;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.4s ease;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            background: white;
        }
        
        .feature-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }
        
        .feature-card .card-img-top {
            width: 100%;
            height: 280px;
            object-fit: cover;
            transition: all 0.4s ease;
        }
        
        .feature-card:hover .card-img-top {
            transform: scale(1.1);
        }
        
        .feature-card .card-body {
            padding: 2rem;
            display: flex;
            flex-direction: column;
        }
        
        .feature-card .card-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .feature-card .card-text {
            color: #666;
            flex: 1;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }
        
        .feature-card .btn {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            border: none;
            padding: 0.75rem 2rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .feature-card .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        
        .feature-card .btn:hover::before {
            width: 300px;
            height: 300px;
        }
        
        .feature-card .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        
        .features-section {
            padding: 4rem 0;
        }
        
        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 3rem;
            position: relative;
            display: inline-block;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60%;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--accent-color), transparent);
        }
        
        .stats-section {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 3rem 0;
            margin: 4rem 0;
            border-radius: 15px;
        }
        
        .stat-item {
            text-align: center;
            padding: 1.5rem;
        }
        
        .stat-item i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--accent-color);
        }
        
        .stat-item h3 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .stat-item p {
            font-size: 1.1rem;
            margin: 0;
            opacity: 0.9;
        }
        
        footer {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 2rem 0;
            margin-top: 4rem;
        }
        
        .card-img-overlay-container {
            position: relative;
            overflow: hidden;
        }
        
        .btn-outline-light:hover {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-book-reader me-2"></i>Library Management
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}"><i class="fas fa-home me-1"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.catalog') }}"><i class="fas fa-book-open me-1"></i>Catalog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/books') }}"><i class="fas fa-book me-1"></i>Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/students') }}"><i class="fas fa-user-graduate me-1"></i>Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/librarians') }}"><i class="fas fa-user-tie me-1"></i>Librarians</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/borrowings') }}"><i class="fas fa-exchange-alt me-1"></i>Borrowings</a>
                    </li>
                </ul>
                <div>
                    <a href="{{ route('logout') }}" class="btn btn-outline-light"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt me-1"></i>Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Banner Section -->
    <div class="banner">
        <div class="banner-content">
            <h1>Welcome to Our Library</h1>
            <p>Discover the world of knowledge and imagination</p>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="container">
        <div class="stats-section">
            <div class="row">
                <div class="col-md-3 stat-item">
                    <i class="fas fa-book"></i>
                    <h3>{{ $booksCount ?? 0 }}{{ $booksCount > 0 ? '+' : '' }}</h3>
                    <p>Books</p>
                </div>
                <div class="col-md-3 stat-item">
                    <i class="fas fa-user-graduate"></i>
                    <h3>{{ $studentsCount ?? 0 }}{{ $studentsCount > 0 ? '+' : '' }}</h3>
                    <p>Students</p>
                </div>
                <div class="col-md-3 stat-item">
                    <i class="fas fa-user-tie"></i>
                    <h3>{{ $librariansCount ?? 0 }}{{ $librariansCount > 0 ? '+' : '' }}</h3>
                    <p>Librarians</p>
                </div>
                <div class="col-md-3 stat-item">
                    <i class="fas fa-exchange-alt"></i>
                    <h3>{{ $borrowingsCount ?? 0 }}{{ $borrowingsCount > 0 ? '+' : '' }}</h3>
                    <p>Borrowings</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container features-section">
        <div class="text-center mb-5">
            <h2 class="section-title">Our Services</h2>
        </div>
        <div class="row g-4">
            <!-- Card 0 - Catalog -->
            <div class="col-md-3">
                <div class="feature-card card">
                    <div class="card-img-overlay-container">
                        <img src="{{ asset('images/catalog.jpg') }}" class="card-img-top" alt="Catalog">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-book-open me-2"></i>Book Catalog</h5>
                        <p class="card-text">Browse our complete collection of books with beautiful cover images and detailed information.</p>
                        <a href="{{ route('books.catalog') }}" class="btn btn-primary">
                            <i class="fas fa-search me-2"></i>Browse Catalog
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 1 - Books -->
            <div class="col-md-3">
                <div class="feature-card card">
                    <div class="card-img-overlay-container">
                        <img src="{{ asset('images/book.jpg') }}" class="card-img-top" alt="Books">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-book me-2"></i>Book Management</h5>
                        <p class="card-text">Explore and manage our extensive collection of books. Add, edit, and organize your library's inventory with ease.</p>
                        <a href="{{ url('/books') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle me-2"></i>Manage Books
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 2 - Students -->
            <div class="col-md-3">
                <div class="feature-card card">
                    <div class="card-img-overlay-container">
                        <img src="{{ asset('images/students.jpg') }}" class="card-img-top" alt="Students">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-user-graduate me-2"></i>Student Records</h5>
                        <p class="card-text">Maintain comprehensive student profiles and track their reading journey through our digital system.</p>
                        <a href="{{ url('/students') }}" class="btn btn-primary">
                            <i class="fas fa-user-plus me-2"></i>Manage Students
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 3 - Librarians -->
            <div class="col-md-3">
                <div class="feature-card card">
                    <div class="card-img-overlay-container">
                        <img src="{{ asset('images/librarian.jpg') }}" class="card-img-top" alt="Librarians">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-user-tie me-2"></i>Staff Management</h5>
                        <p class="card-text">Organize and manage your library staff efficiently with our comprehensive staff management system.</p>
                        <a href="{{ url('/librarians') }}" class="btn btn-primary">
                            <i class="fas fa-users-cog me-2"></i>Manage Staff
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Info Section -->
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <div class="p-5 bg-white rounded-3 shadow-sm">
                    <h3 class="mb-4" style="font-family: 'Playfair Display', serif; color: var(--primary-color);">
                        <i class="fas fa-quote-left me-2"></i>Empowering Minds Through Knowledge
                    </h3>
                    <p class="lead text-muted">
                        Our library management system provides a seamless experience for managing books, students, and borrowing records. 
                        Navigate through our intuitive interface to access all the features you need to run a modern library efficiently.
                    </p>
                    <div class="mt-4">
                        <a href="{{ url('/borrowings') }}" class="btn btn-lg" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: white; border: none; border-radius: 50px; padding: 0.75rem 2.5rem;">
                            <i class="fas fa-clipboard-list me-2"></i>View Borrowing Records
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5 class="fw-bold"><i class="fas fa-book-reader me-2"></i>Library Management</h5>
                    <p class="small">Your trusted partner in knowledge management</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h6 class="fw-bold">Quick Links</h6>
                    <ul class="list-unstyled small">
                        <li><a href="{{ url('/books') }}" class="text-white text-decoration-none">Browse Books</a></li>
                        <li><a href="{{ url('/students') }}" class="text-white text-decoration-none">Students</a></li>
                        <li><a href="{{ url('/borrowings') }}" class="text-white text-decoration-none">Borrowings</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h6 class="fw-bold">Contact</h6>
                    <p class="small mb-0"><i class="fas fa-envelope me-2"></i>library@example.com</p>
                    <p class="small mb-0"><i class="fas fa-phone me-2"></i>+1 (555) 123-4567</p>
                </div>
            </div>
            <hr class="bg-white opacity-25">
            <p class="mb-0">© 2025 School Library. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
