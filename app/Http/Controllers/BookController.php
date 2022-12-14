<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Faker\Factory as Faker;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $faker = Faker::create('id_ID');
        $faker->seed();
        $randomId = $faker->unique->isbn13();
        $randomCat = $faker->randomElement(['XXX', 'Novel', 'Komik', 'Biografi', 'Dongeng']);
        $randomCom = $faker->company();
        return view('books.create', compact('randomId','randomCat','randomCom'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'id' => 'required|digits:13',
            'judul' => 'required|max:255',
            'halaman' => 'required|integer|min:0|max:1000',
            'kategori' => 'required|max:255',
            'penerbit' => 'required|max:255',
        ];
        $validated = $request->validate($rules);
        Book::create($validated);
        // return "data film {$validated['title']} sudah ditambah";
        $request->session()->flash('success',"Berhasil menambahkan buku {$validated['judul']}!");
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
        $rules = [
            // 'id' => 'required|max:13',
            'judul' => 'required|max:255',
            'halaman' => 'required|integer|min:0|max:1000',
            'kategori' => 'required|max:255',
            'penerbit' => 'required|max:255',

        ];
        $validated = $request->validate($rules);
        $book::where('id', [$book->id])->update($validated);
        // return "data film {$validated['title']} sudah ditambah";
        $request->session()->flash('success',"Berhasil meremajakan data buku {$validated['judul']}!");
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success',"Berhasil menghapus buku {$book['judul']}!");
    }
}
