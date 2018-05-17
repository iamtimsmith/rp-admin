<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Char;
use App\User;

class PartyController extends Controller
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
        return view('party.index')->with('party', $user->party);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('party.create')->with('user', $user);
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
            'name' => 'required',
            'player' => 'required',
            'ac' => 'required',
            'hp' => 'required',
            'pp' => 'required',
            'active' => 'required',
            'notes' => 'nullable',
            'portrait' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('portrait')) {
            $filenameWithExt = $request->file('portrait')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('portrait')->getClientOriginalExtension();
            // Filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('portrait')->storeAs('public/portraits', $filenameToStore);
        } else {
            $filenameToStore = 'noimage.jpg';
        }

        // Create Note to store
        $char = new Char;
        $char->name = $request->input('name');
        $char->player = $request->input('player');
        $char->ac = $request->input('ac');
        $char->hp = $request->input('hp');
        $char->pp = $request->input('pp');
        $char->active = $request->input('active');
        $char->notes = $request->input('notes');
        $char->user_id = auth()->user()->id;
        $char->portrait = $filenameToStore;

        $char->save();
        return redirect('party')->with('success', 'Character Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $char = Char::find($id);
        return view('party.show')->with('char', $char);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $char = Char::find($id);

        if (auth()->user()->id !== $char->user_id) {
            return redirect('/party')->with('error', 'Unauthorized Page');
        }
        return view('party.edit')->with('char',$char);
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
            'name' => 'required',
            'player' => 'required',
            'ac' => 'required',
            'hp' => 'required',
            'pp' => 'required',
            'active' => 'nullable',
            'notes' => 'nullable',
            'portrait' => 'nullable'
        ]);
        // Update post
        $char = Char::find($id);
        $char->name = $request->input('name');
        $char->player = $request->input('player');
        $char->ac = $request->input('ac');
        $char->hp = $request->input('hp');
        $char->pp = $request->input('pp');
        $char->active = $request->input('active');
        $char->notes = $request->input('notes');
        $char->save();
        return redirect('/party')->with('success', 'Character Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $char = Char::find($id);
        
        //Check for correct user
        if(auth()->user()->id !== $char->user_id) {
            return redirect('/party')->with('error', 'Unauthorized Page');    
        }

        $char->delete();
        return redirect('/party')->with('success', 'Character Removed');
    }
}
