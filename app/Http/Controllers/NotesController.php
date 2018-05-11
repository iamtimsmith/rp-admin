<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\User;

class NotesController extends Controller
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
        return view('notes.index')->with('notes', $user->notes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
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
        $note = new Note;
        $note->title = $request->input('title');
        $note->content = $request->input('content');
        $note->user_id = auth()->user()->id;
        $note->featured_image = $filenameToStore;

        $note->save();
        return redirect('notes')->with('success', 'Note Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::find($id);
        return view('notes.show')->with('note', $note);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Note::find($id);

        if (auth()->user()->id !== $note->user_id) {
            return redirect('/notes')->with('error', 'Unauthorized Page');
        }
        return view('notes.edit')->with('note',$note);
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
        $note = Note::find($id);
        $note->title = $request->input('title');
        $note->content = $request->input('content');
        $note->save();
        return redirect('/notes')->with('success', 'Note Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::find($id);
        
        //Check for correct user
        if(auth()->user()->id !== $note->user_id) {
            return redirect('/notes')->with('error', 'Unauthorized Page');    
        }

        $note->delete();
        return redirect('/notes')->with('success', 'Post Removed');
    }
}
