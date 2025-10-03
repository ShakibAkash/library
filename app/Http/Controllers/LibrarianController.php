<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibrarianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('librarians.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('librarians.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route('librarians.index')
            ->with('status', 'Librarian created (placeholder).');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('librarians.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('librarians.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return redirect()->route('librarians.index')
            ->with('status', 'Librarian updated (placeholder).');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('librarians.index')
            ->with('status', 'Librarian deleted (placeholder).');
    }
}
