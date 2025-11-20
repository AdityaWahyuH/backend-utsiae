<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    // Get all books
    public function index()
    {
        $books = Book::all();
        return response()->json([
            'success' => true,
            'data' => $books
        ]);
    }

    // Get single book
    public function show($id)
    {
        $book = Book::find($id);
        
        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'data' => $book
        ]);
    }

    // Create new book
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'jumlah_halaman' => 'required|integer|min:1',
            'kategori' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books,isbn',
            'status' => 'sometimes|in:Tersedia,Dipinjam'
        ]);

        $book = Book::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Book created successfully',
            'data' => $book
        ], Response::HTTP_CREATED);
    }

    // Update book
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        
        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $validated = $request->validate([
            'judul' => 'sometimes|string|max:255',
            'pengarang' => 'sometimes|string|max:255',
            'penerbit' => 'sometimes|string|max:255',
            'tahun_terbit' => 'sometimes|integer|min:1900|max:' . date('Y'),
            'jumlah_halaman' => 'sometimes|integer|min:1',
            'kategori' => 'sometimes|string|max:255',
            'isbn' => 'sometimes|string|unique:books,isbn,' . $id,
            'status' => 'sometimes|in:Tersedia,Dipinjam'
        ]);

        $book->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Book updated successfully',
            'data' => $book
        ]);
    }

    // Delete book
    public function destroy($id)
    {
        $book = Book::find($id);
        
        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $book->delete();

        return response()->json([
            'success' => true,
            'message' => 'Book deleted successfully'
        ]);
    }
}