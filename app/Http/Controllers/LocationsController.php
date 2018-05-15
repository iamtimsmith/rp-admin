<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\User;

class LocationsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['', '']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$notes = Note::orderBy('id', 'desc')->get();
        //$notes = Note::all();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('locations.index')->with('locations', $user->locations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate input
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'featured_image' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('featured_image')) {
            $filenameWithExt = $request->file('featured_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('featured_image')->getClientOriginalExtension();
            // Filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('featured_image')->storeAs('public/featured_images', $filenameToStore);
        } else {
            $filenameToStore = 'noimage.jpg';
        }

        // Create Note to store
        $location = new Location;
        $location->title = $request->input('title');
        $location->content = $request->input('content');
        $location->user_id = auth()->user()->id;
        $location->map = $filenameToStore;

        $location->save();
        return redirect('locations')->with('success', 'Location Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = Location::find($id);
        return view('locations.show')->with('location', $location);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Location::find($id);

        if (auth()->user()->id !== $location->user_id) {
            return redirect('/locations')->with('error', 'Unauthorized Page');
        }
        return view('locations.edit')->with('location',$location);
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
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);
        // Update post
        $location = Location::find($id);
        $location->title = $request->input('title');
        $location->content = $request->input('content');
        $location->save();
        return redirect('/locations')->with('success', 'Note Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::find($id);
        
        //Check for correct user
        if(auth()->user()->id !== $location->user_id) {
            return redirect('/locations')->with('error', 'Unauthorized Page');    
        }

        $location->delete();
        return redirect('/locations')->with('success', 'Post Removed');
    }
}