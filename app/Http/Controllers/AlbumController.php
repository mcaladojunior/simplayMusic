<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$albums = Album::all()->paginate(25);
        return view('albums.index', compact('albums'));
    }

    public function create()
    {
        return view('albums.create');
    }

	public function store(Request $request)
    {
        $validatedData = $request->validate([
            'album_name' => 'required|max:128',
            'year' => 'required',
        ]);
        
        $album = Album::create($validatedData);

        return redirect()->route('albums.index', compact('album'))->with('success','Album created successfully.');
    }

    public function show($id)
    {
        $album = Album::findOrFail($id);
        return view('albums.show', compact('album'));
    }

    public function edit($id)
    {
        $album = Album::findOrFail($id);
        return view('albums.edit', compact('album'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'album_name' => 'required|max:128',
            'year' => 'required',
        ]);
        
        $album = Album::findOrFail($id)->update($validatedData);
        
        return redirect()->route('albums.index', compact('album'))->with('success','Album updated successfully.');
    }

    public function destroy($id)
    {
        Album::findOrFail($id)->delete();
    	return redirect()->route('albums.index')->with('success','Album deleted successfully.');
    }    
}
