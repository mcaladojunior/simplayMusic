<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$albums = Album::all();
        return view('albums.index', compact('albums'));
    }

    public function create()
    {
        $artists = Artist::all();
        return view('albums.create', compact('artists'));
    }

	public function store(Request $request)
    {
        $validatedData = $request->validate([
            'album_name' => 'required|max:128',
            'year' => 'required',
            'artist_id' => 'required',
        ]);
        
        $artist = Artist::findOrFail($request['artist_id']);

        $artist->albums()->create([
            'album_name' => $request['album_name'],
            'year' => $request['year'],
            'artist_name' => $artist->artist_name,
        ]);

        return redirect()->route('albums.index')->with('success','Album created successfully.');
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
            'artist_id' => 'required',
        ]);
        
        $artist = Artist::findOrFail($request['artist_id']);

        $album = Album::findOrFail($id)->update([
            'album_name' => $request['album_name'],
            'year' => $request['year'],
            'artist_name' => $artist->artist_name,
            'artist_id' => $artist->id,
        ]);
        
        return redirect()->route('albums.index')->with('success','Album updated successfully.');
    }

    public function destroy($id)
    {
        Album::findOrFail($id)->delete();
    	return redirect()->route('albums.index')->with('success','Album deleted successfully.');
    }    
}
