<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;
use Hash;

class AlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all from Albums table
        $albums = Album::all();
        return view('admin.albums.index', [
        //put $albums into 'album' then
        //the view will see the albums
        'albums' => $albums
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //when this is called create page will show
    public function create()
    {
        return view('admin.albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //with this function the create data will be stored in the database
    public function store(Request $request)
    {
        //when user clicks submit on the create view above
        //the album will be started in the database
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'price' => 'required|numeric',
            'no_of_tracks' => 'required|numeric',
            'album_image' => 'file|image'
        ]);

        $album_image = $request->file('album_image');
        $filename = $album_image->hashName();
        $path = $album_image->storeAs('public/images', $filename);

        //if validation passes create
        $album = new Album();
        $album->title = $request->input('title');
        $album->artist = $request->input('artist');
        $album->price = $request->input('price');
        $album->no_of_tracks = $request->input('no_of_tracks');
        $album->image_location = $filename;
        $album->save();
        return redirect()->route('admin.albums.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //when show is called it will return the view of show page or display error if failed to find the album
    public function show($id)
    {
        $album = Album::findOrFail($id);
        return view('admin.albums.show', [
            'album' => $album
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //when edit is called it will return the view of edit page
    public function edit($id)
    {
        //get all albums by id from the database
        $album = Album::findOrFail($id);
        //load the edit view and pass album to that view
        return view('admin.albums.edit', [
            'album' => $album
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //when this is called it will update the details passed from edit in the database
    public function update(Request $request, $id)
    {
        $album = Album::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'price' => 'required',
            'no_of_tracks' => 'required'
        ]);
        $album->title = $request->input('title');
        $album->artist = $request->input('artist');
        $album->price = $request->input('price');
        $album->no_of_tracks = $request->input('no_of_tracks');
        $album->save();
        return redirect()->route('admin.albums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //deletes the album entry from the database
    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $album->delete();

        return redirect()->route('admin.albums.index');
    }
}
