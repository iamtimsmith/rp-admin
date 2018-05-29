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
            'images' => 'nullable'
        ]);

        // Create Note to store
        $note = new Note;
        $note->title = $request->input('title');
        $note->content = $request->input('content');
        $note->user_id = auth()->user()->id;
        $note->images = $request->input('images');

        $note->save();
        return redirect()->route('note', ['id'=>$note->id])->with('success', 'Note Created');
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

        if ( isset($note) ) {
            if (auth()->user()->id !== $note->user_id) {
                return redirect('/notes')->with('error', 'Unauthorized Page');
            }
            return view('notes.show')->with('note', $note);
        } else {
            return redirect('/notes')->with('error', "Note doesn't exist.");
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
        $note = Note::find($id);

        if ( isset($note) ) {
            if (auth()->user()->id !== $note->user_id) {
                return redirect('/notes')->with('error', 'Unauthorized Page');
            }
            return view('notes.edit')->with('note', $note);
        } else {
            return redirect('/notes')->with('error', "Note doesn't exist.");
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
            'content' => 'required',
            'images' => 'nullable'
        ]);
        // Update post
        $note = Note::find($id);
        $note->title = $request->input('title');
        $note->content = $request->input('content');
        $note->images = $request->input('images');
        $note->save();
        return redirect()->route('note', ['id'=>$note->id])->with('success', 'Note Updated');
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
