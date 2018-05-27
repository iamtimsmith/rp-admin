<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encounter;
use App\User;

class EncountersController extends Controller
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
        return view('encounters.index')->with('encounters', $user->encounters);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('encounters.create');
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

        // Create Encounter to store
        $encounter = new Encounter;
        $encounter->title = $request->input('title');
        $encounter->monsters = $request->input('monsters');
        $encounter->content = $request->input('content');
        $encounter->user_id = auth()->user()->id;
        $encounter->featured_image = $filenameToStore;

        $encounter->save();
        return redirect()->route('encounter', ['id'=>$encounter->id])->with('success', 'Encounter Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $encounter = Encounter::find($id);
        if ( isset($encounter) ) {
        if (auth()->user()->id !== $encounter->user_id) {
            return redirect('/encounters')->with('error', 'Unauthorized Page');
        }
        return view('encounters.show')->with('encounter', $encounter);
    } else {
        return redirect('/encounters')->with('error', "Encounter doesn't exist.");
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
        $encounter = Encounter::find($id);

        if ( isset($encounter) ) {
            if (auth()->user()->id !== $encounter->user_id) {
                return redirect('/encounters')->with('error', 'Unauthorized Page');
            }
            return view('encounters.edit')->with('encounter',$encounter);
        } else {
            return redirect('/encounters')->with('error', "Encounter doesn't exist.");
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
            'content' => 'required'
        ]);
        // Update post
        $encounter = Encounter::find($id);
        $encounter->title = $request->input('title');
        $encounter->monsters = $request->input('monsters');
        $encounter->content = $request->input('content');
        $encounter->save();
        return redirect()->route('encounter', ['id'=>$encounter->id])->with('success', 'Encounter Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $encounter = Encounter::find($id);
        
        //Check for correct user
        if(auth()->user()->id !== $encounter->user_id) {
            return redirect('/encounters')->with('error', 'Unauthorized Page');    
        }

        $encounter->delete();
        return redirect('/encounters')->with('success', 'Post Removed');
    }
}
