<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Faker\Factory as Faker;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allAuthors = Author::all();
        $allAuthors->loadCount('books');
        return view('authors.index', compact('allAuthors'));
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
        $randomName = $faker->name();
        $randomCountry = $faker->country();
        return view('authors.create', compact('randomName', 'randomCountry' ));
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
            'nama' => 'required|max:255',
            'negara' => 'required|max:255',
        ];

        $validated = $request->validate($rules);

        Author::create($validated);

        // return "data film {$validated['title']} sudah ditambah";
        $request->session()->flash('success',"Berhasil menambahkan data penulis - {$validated['nama']}!");
        return redirect()->route('authors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
        $id = $author->id;
        $allBooks = Book::with('author')->where('author_id','=',null)->orderByDesc('id')->paginate(90);
        $authorById = $author->books()->where('author_id','=',$id)->get();
        $authorCount = $author->books()->where('author_id','=',$id)->count();
        return view('authors.show', compact('author','allBooks','authorById','authorCount','id'));
        // $allBook = Book::with('author')->orderByDesc('id')->paginate(10);
        // dump($allBook);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $rules = [
            'id' => 'required|max:13',
            'nama' => 'required|max:255',
            'negara' => 'required|max:255',
        ];
        $validated = $request->validate($rules);
        $author::where('id', [$author->id])->update($validated);

        $request->session()->flash('success',"Berhasil meremajakan data penulis - {$validated['nama']}!");
        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        //
        $author->delete();
        return redirect()->route('authors.index')->with('success',"Berhasil menghapus data penulis - {$author['nama']}!");
    }
}
