<?php

namespace App\Http\Controllers;

use App\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$artists = Artist::all()->paginate(25);
        return view('artists.index', compact('artists'));
    }

    public function create()
    {
        return view('artists.create');
    }

	public function store(Request $request)
    {
        $validatedData = $request->validate([
            'artist_name' => 'required|max:128',
            'twitter_handle' => 'required',
        ]);
        
        $artist = Artist::create($validatedData);

        return redirect()->route('artists.index', compact('artist'))->with('success','Artist created successfully.');
    }

    public function show($id)
    {
        $artist = Artist::findOrFail($id);
        return view('artists.show', compact('artist'));
    }

    public function edit($id)
    {
        $artist = Artist::findOrFail($id);
        return view('artists.edit', compact('artist'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'artist_name' => 'required|max:128',
            'twitter_handle' => 'required',
        ]);
        
        $artist = Artist::findOrFail($id)->update($validatedData);
        
        return redirect()->route('artists.index', compact('artist'))->with('success','Artist updated successfully.');
    }

    public function destroy($id)
    {
        Artist::findOrFail($id)->delete();
    	return redirect()->route('artists.index')->with('success','Artist deleted successfully.');
    }    
}
