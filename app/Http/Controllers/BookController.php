<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        $books = Book::when($search, function($query, $search) {
            return $query->where('title', 'like', "%{$search}%")
                         ->orWhere('author', 'like', "%{$search}%")
                         ->orWhere('genre', 'like', "%{$search}%");
        })->orderBy('created_at', 'desc')->get();
        
        return view('books.index', compact('books', 'search'));
    }

    /**
     * Show the catalog/showcase page
     */
    public function catalog(Request $request)
    {
        $search = $request->get('search');
        $letter = $request->get('letter');
        
        $books = Book::when($search, function($query, $search) {
            return $query->where('title', 'like', "%{$search}%")
                         ->orWhere('author', 'like', "%{$search}%")
                         ->orWhere('genre', 'like', "%{$search}%");
        })
        ->when($letter, function($query, $letter) {
            return $query->where('title', 'like', $letter . '%');
        })
        ->orderBy('created_at', 'desc')
        ->get();
        
        return view('books.catalog', compact('books', 'search', 'letter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = \Illuminate\Support\Str::slug($request->title);

        // Handle image upload
        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/books'), $imageName);
            $data['cover_url'] = 'images/books/' . $imageName;
        }

        Book::create($data);
        return redirect()->route('books.index')->with('success', 'Book created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = \Illuminate\Support\Str::slug($request->title);

        // Handle image upload
        if ($request->hasFile('cover_image')) {
            // Delete old image if exists
            if ($book->cover_url && file_exists(public_path($book->cover_url))) {
                unlink(public_path($book->cover_url));
            }
            
            $image = $request->file('cover_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/books'), $imageName);
            $data['cover_url'] = 'images/books/' . $imageName;
        }

        $book->update($data);
        return redirect()->route('books.show', $book->id)->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Book $book)
{
    $book->delete();
    return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
}

}
