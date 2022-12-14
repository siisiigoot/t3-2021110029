<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        //
        $jumlahBuku = Book::count();
        $jumlahPenulis = Author::count();
        $allAuthors = Author::all();
        $allAuthors->loadCount('books');
        return view('dashboard', compact('jumlahBuku','jumlahPenulis'));
    }  

    public function setAuthorId(Request $request, Author $author)
    {
        //
        $book = Book::findOrFail($request->bookId);
        $book->author_id = $request->id;
        $book->save();
        $request->session()->flash('success',"Berhasil menambahkan buku!");
        return redirect(route('authors.show',[$request->id]));
    }    

    public function setNull(Request $request, Book $book)
    {
        //
        $book = Book::findOrFail($request->bookId);
        $book->author_id = null;
        $book->save();
        return redirect(route('authors.show',[$request->id]));
        // return view('dashboard', compact('jumlahBuku','jumlahPenulis'));
    }    
}
