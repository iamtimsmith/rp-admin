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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('locations.index')->with('locations', $user->locations->sortBy('title')->values()->all())->with('user', $user);
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
            'monsters' => 'nullable',
            'content' => 'required',
            'images' => 'nullable'
        ]);

        // Create Note to store
        $location = new Location;
        $location->title = $request->input('title');
        $location->monsters = $request->input('monsters');
        $location->content = $request->input('content');
        $location->encounters = $request->input('encounters');
        $location->user_id = auth()->user()->id;
        $location->images = $request->input('images');

        $location->save();
        return redirect()->route('location', ['id'=>$location->id])->with('success', 'Location Created');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $location = Location::find($id);
        if( isset($location) ) {
            if (auth()->user()->id !== $location->user_id) {
                return redirect('/locations')->with('error', 'Unauthorized Page');
            }
            return view('locations.show')->with('location', $location)->with('user', $user);
        } else {
            return redirect('/locations')->with('error', "Location doesn't exist.");
        }
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

        if( isset($location) ) {
            if (auth()->user()->id !== $location->user_id) {
                return redirect('/locations')->with('error', 'Unauthorized Page');
            }
            return view('locations.edit')->with('location',$location);
        } else {
            return redirect('/locations')->with('error', "Location doesn't exist.");
        }
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
            'monsters' => 'nullable',
            'content' => 'required',
            'images' => 'nullable'
        ]);
        // Update post
        $location = Location::find($id);
        $location->title = $request->input('title');
        $location->monsters = $request->input('monsters');
        $location->encounters = $request->input('encounters');
        $location->content = $request->input('content');
        $location->images = $request->input('images');
        $location->save();
        return redirect()->route('location', ['id'=>$location->id])->with('success', 'Note Updated');
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
