<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{

     protected $validationData = [
        'title'=>'required|unique:comics|min:3',
        'description' => 'required|min:10',
        'thumb' => 'required|active_url',
        'price' => 'required',
        'series' => 'required',
        'sale_date' => 'required|date|after:1900/01/01',
        'type'=> 'required',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comics = Comic::all();
        return view('index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $comic=new Comic();
        return view('create', compact('comic'));
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


        $comic=$request->all();

        $validatedComicRule=$request->validate($this->validationData);

        $newComic = new Comic();
        $newComic->title = $comic['title'];
        $newComic->description = $comic['description'];
        $newComic->thumb = $comic['thumb'];
        $newComic->price = $comic['price'];
        $newComic->series = $comic['series'];
        $newComic->sale_date = $comic['sale_date'];
        $newComic->type = $comic['type'];
        $newComic->save();

        return redirect()->route('comics.show' , $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $comic = Comic::findOrFail($id);
	    return view('show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $comic = Comic::findOrFail($id);
        return view('edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $newComic=$request->all();

        $comic = Comic::findOrFail($id);

        $validatedComicRule=$request->validate($this->validationData);
        
        $comic->update($newComic);

        return redirect()->route('comics.show', $comic->id); //<-ti riporta allo show
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $comic=Comic::findOrFail($id);
        $comic->delete();
        return redirect()->route('comics.index')->with('delete', $comic->title);
    }
}
