<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Library Management')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            --dark-text: #2c3e50;
            --card-bg: #ffffff;
            --navbar-gradient-1: #1e3c72;
            --navbar-gradient-2: #2a5298;
        }
        
        /* Dark Mode Colors */
        body.dark-mode {
            --primary-color: #ffffff;
            --secondary-color: #8ab4f8;
            --accent-color: #ff6b6b;
            --light-bg: #2d3142;
            --dark-text: #ffffff;
            --card-bg: #3d3f52;
            --navbar-gradient-1: #2d3142;
            --navbar-gradient-2: #3d3f52;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
            color: var(--dark-text);
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--navbar-gradient-1) 0%, var(--navbar-gradient-2) 100%) !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 0;
            transition: background 0.3s ease;
        }
        
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: 0.5px;
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
        
        .btn-outline-light:hover {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: #121212;
        }
        
        /* Dark Mode Toggle Button */
        .dark-mode-toggle {
            background: transparent;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-right: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }
        
        .dark-mode-toggle:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: scale(1.1);
        }
        
        .dark-mode-toggle i {
            font-size: 1.3rem;
            transition: all 0.4s ease;
            color: white;
        }
        
        .dark-mode-toggle:hover i {
            transform: rotate(180deg);
        }
        
        body.dark-mode .dark-mode-toggle {
            background: transparent;
        }
        
        body.dark-mode .dark-mode-toggle:hover {
            background: rgba(255, 107, 107, 0.2);
        }
        
        body.dark-mode .dark-mode-toggle i {
            color: #ff6b6b;
        }
        
        /* Dark Mode Adjustments */
        body.dark-mode .card,
        body.dark-mode .form-control,
        body.dark-mode .form-select {
            background-color: var(--card-bg);
            color: var(--dark-text);
            border-color: #0f3460;
        }
        
        body.dark-mode .form-control,
        body.dark-mode .form-select,
        body.dark-mode input[type="text"],
        body.dark-mode input[type="email"],
        body.dark-mode input[type="tel"],
        body.dark-mode input[type="date"],
        body.dark-mode input[type="number"],
        body.dark-mode input[type="file"],
        body.dark-mode textarea,
        body.dark-mode select {
            background-color: #4a4d62 !important;
            color: #ffffff !important;
            border: 2px solid #5a5d72 !important;
        }
        
        body.dark-mode .form-control::placeholder,
        body.dark-mode input::placeholder,
        body.dark-mode textarea::placeholder {
            color: #b8c5d6 !important;
            opacity: 1 !important;
        }
        
        body.dark-mode .form-control:focus,
        body.dark-mode .form-select:focus,
        body.dark-mode input:focus,
        body.dark-mode textarea:focus,
        body.dark-mode select:focus {
            background-color: #4a4d62 !important;
            color: #ffffff !important;
            border-color: #ff6b6b !important;
            box-shadow: 0 0 0 0.2rem rgba(255, 107, 107, 0.25) !important;
        }
        
        body.dark-mode .form-label,
        body.dark-mode label {
            color: #e8eaed !important;
            font-weight: 500;
        }
        
        body.dark-mode .form-card {
            background-color: var(--card-bg) !important;
            box-shadow: 0 5px 20px rgba(0,0,0,0.3) !important;
        }
        
        body.dark-mode .table {
            color: var(--dark-text);
            background-color: transparent;
        }
        
        body.dark-mode .table thead th {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);
            color: #ffffff;
            border: none;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            font-size: 0.85rem;
            padding: 1rem;
        }
        
        body.dark-mode .table tbody tr {
            background-color: #3d3f52;
            border-bottom: 1px solid #2d3142;
            transition: all 0.3s ease;
        }
        
        body.dark-mode .table tbody tr:hover {
            background-color: rgba(255, 107, 107, 0.15);
            transform: scale(1.01);
            box-shadow: 0 2px 8px rgba(255, 107, 107, 0.2);
        }
        
        body.dark-mode .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            color: #ffffff !important;
            border-color: #2d3142;
            font-weight: 500;
        }
        
        body.dark-mode .table tbody tr td {
            color: #ffffff !important;
        }
        
        body.dark-mode .table-striped tbody tr:nth-of-type(odd) {
            background-color: #434556;
        }
        
        body.dark-mode .table-striped tbody tr:nth-of-type(odd):hover {
            background-color: rgba(255, 107, 107, 0.15);
        }
        
        body.dark-mode .page-header {
            background: linear-gradient(135deg, rgba(61, 63, 82, 0.3) 0%, rgba(45, 49, 66, 0.3) 100%);
            border-left-color: var(--accent-color);
        }
        
        body.dark-mode .page-header p {
            color: #b8c5d6 !important;
            font-weight: 500;
            opacity: 1;
        }
        
        body.dark-mode .btn-primary {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);
            border: none;
            color: #ffffff;
        }
        
        body.dark-mode .btn-primary:hover {
            background: linear-gradient(135deg, #ff8787 0%, #ff7a8a 100%);
            color: #ffffff;
        }
        
        body.dark-mode .btn-cancel {
            background: #6c757d !important;
            color: #ffffff !important;
            border: none !important;
        }
        
        body.dark-mode .btn-cancel:hover {
            background: #5a6268 !important;
            color: #ffffff !important;
        }
        
        body.dark-mode .btn-submit,
        body.dark-mode .btn-success {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%) !important;
            color: #ffffff !important;
            border: none !important;
        }
        
        body.dark-mode .btn-submit:hover,
        body.dark-mode .btn-success:hover {
            background: linear-gradient(135deg, #ff8787 0%, #ff7a8a 100%) !important;
            color: #ffffff !important;
        }
        
        body.dark-mode .modal-content {
            background-color: var(--card-bg);
            color: var(--dark-text);
            border-color: #0f3460;
        }
        
        body.dark-mode .btn-outline-light {
            border-color: rgba(255, 255, 255, 0.3);
            color: white;
        }
        
        body.dark-mode .btn-outline-light:hover {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: #ffffff;
        }
        
        body.dark-mode .page-header h1 {
            color: var(--primary-color);
        }
        
        footer {
            background: linear-gradient(135deg, var(--navbar-gradient-1) 0%, var(--navbar-gradient-2) 100%);
            color: white;
            margin-top: 4rem;
            transition: background 0.3s ease;
        }
        
        /* Table Styling for Light Mode */
        .table {
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }
        
        .table thead th {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: #ffffff;
            border: none;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            font-size: 0.85rem;
            padding: 1rem;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        
        .table tbody tr {
            background-color: #ffffff;
            border-bottom: 1px solid #e9ecef;
            transition: all 0.3s ease;
        }
        
        .table tbody tr:hover {
            background-color: rgba(30, 60, 114, 0.05);
            transform: scale(1.01);
            box-shadow: 0 2px 8px rgba(30, 60, 114, 0.1);
        }
        
        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            color: #2c3e50;
            border-color: #e9ecef;
        }
        
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa;
        }
        
        .table-striped tbody tr:nth-of-type(odd):hover {
            background-color: rgba(30, 60, 114, 0.08);
        }
        
        .page-header {
            background: linear-gradient(135deg, rgba(30, 60, 114, 0.05) 0%, rgba(42, 82, 152, 0.05) 100%);
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
            border-left: 5px solid var(--accent-color);
            transition: all 0.3s ease;
        }
        
        .page-header h1 {
            font-family: 'Playfair Display', serif;
            color: var(--primary-color);
            font-weight: 700;
            margin: 0;
        }
        
        .page-header p {
            font-size: 1rem;
            font-weight: 500;
            letter-spacing: 0.3px;
            opacity: 0.85;
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-book-reader me-2"></i>Library Management
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('catalog') ? 'active' : '' }}" href="{{ route('books.catalog') }}">
                            <i class="fas fa-book-open me-1"></i>Catalog
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('books*') ? 'active' : '' }}" href="{{ url('/books') }}">
                            <i class="fas fa-book me-1"></i>Books
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('students*') ? 'active' : '' }}" href="{{ url('/students') }}">
                            <i class="fas fa-user-graduate me-1"></i>Students
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('librarians*') ? 'active' : '' }}" href="{{ url('/librarians') }}">
                            <i class="fas fa-user-tie me-1"></i>Librarians
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('borrowings*') ? 'active' : '' }}" href="{{ url('/borrowings') }}">
                            <i class="fas fa-exchange-alt me-1"></i>Borrowings
                        </a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <button class="dark-mode-toggle text-white border-0" id="darkModeToggle" title="Toggle Dark Mode">
                        <i class="fas fa-moon" id="darkModeIcon"></i>
                    </button>
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

    <!-- Main Content -->
    <div class="container mt-4 mb-5">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-white text-center py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5 class="fw-bold"><i class="fas fa-book-reader me-2"></i>Library Management</h5>
                    <p class="small mb-0">Your trusted partner in knowledge management</p>
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
            <p class="mb-0 small">© 2025 School Library. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Dark Mode Script -->
    <script>
        // Check for saved dark mode preference
        const darkModeToggle = document.getElementById('darkModeToggle');
        const darkModeIcon = document.getElementById('darkModeIcon');
        const body = document.body;
        
        // Load saved preference
        if (localStorage.getItem('darkMode') === 'enabled') {
            body.classList.add('dark-mode');
            darkModeIcon.classList.remove('fa-moon');
            darkModeIcon.classList.add('fa-sun');
        }
        
        // Toggle dark mode
        darkModeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            
            if (body.classList.contains('dark-mode')) {
                darkModeIcon.classList.remove('fa-moon');
                darkModeIcon.classList.add('fa-sun');
                localStorage.setItem('darkMode', 'enabled');
            } else {
                darkModeIcon.classList.remove('fa-sun');
                darkModeIcon.classList.add('fa-moon');
                localStorage.setItem('darkMode', 'disabled');
            }
        });
    </script>
    
    @yield('scripts')
</body>
</html>
