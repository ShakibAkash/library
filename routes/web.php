<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\BorrowingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Book catalog route
    Route::get('/catalog', [BookController::class, 'catalog'])->name('books.catalog');
    
    // Students, Books & Librarians REST routes
    Route::resource('students', StudentController::class);
    Route::resource('books', BookController::class);
    Route::resource('librarians', LibrarianController::class);
    Route::resource('borrowings', BorrowingController::class);
});

// Add your /home route here
Route::get('/home', function () {
    $booksCount = \App\Models\Book::count();
    $studentsCount = \App\Models\Student::count();
    $librariansCount = \App\Models\Librarian::count();
    $borrowingsCount = \App\Models\Borrowing::count();
    
    return view('home', compact('booksCount', 'studentsCount', 'librariansCount', 'borrowingsCount'));
})->middleware(['auth'])->name('home');

require __DIR__.'/auth.php';
