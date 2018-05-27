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
            'ac' => 'nullable',
            'hp' => 'nullable',
            'pp' => 'nullable',
            'speed' => 'nullable',
            'active' => 'required',
            'str' => 'nullable',
            'dex' => 'nullable',
            'con' => 'nullable',
            'int' => 'nullable',
            'wis' => 'nullable',
            'cha' => 'nullable',
            'saving_throws' => 'nullable',
            'skills' => 'nullable',
            'damage_vulnerabilities' => 'nullable',
            'damage_resistances' => 'nullable',
            'condition_immunities' => 'nullable',
            'senses' => 'nullable',
            'languages' => 'nullable',
            'abilities' => 'nullable',
            'actions' => 'nullable',
            'equipment' => 'nullable',
            'notes' => 'nullable',
            'portrait' => 'nullable|max:1999'
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
        $char->speed = $request->input('speed');
        $char->status = $request->input('active');
        $char->str = $request->input('str');
        $char->dex = $request->input('dex');
        $char->con = $request->input('con');
        $char->int = $request->input('int');
        $char->wis = $request->input('wis');
        $char->cha = $request->input('cha');
        $char->saving_throws = $request->input('saving_throws');
        $char->skills = $request->input('skills');
        $char->damage_vulnerabilities = $request->input('damage_vulnerabilities');
        $char->damage_resistances = $request->input('damage_resistances');
        $char->condition_immunities = $request->input('condition_immunities');
        $char->senses = $request->input('senses');
        $char->languages = $request->input('languages');
        $char->abilities = $request->input('abilities');
        $char->actions = $request->input('actions');
        $char->equipment = $request->input('equipment');
        $char->notes = $request->input('notes');
        $char->user_id = auth()->user()->id;
        $char->portrait = $filenameToStore;

        $char->save();
        return redirect()->route('character', ['id'=>$char->id])->with('success', 'Character Created');
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
        $char = Char::find($id);

        if ( isset($char) ) {
            if (auth()->user()->id !== $char->user_id) {
                return redirect('/party')->with('error', 'Unauthorized Page');
            }
            return view('party.show')->with('char', $char)->with('user', $user);
        } else {
            return redirect('/party')->with('error', "Character doesn't exist");
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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $char = Char::find($id);

        if ( isset($char) ) {
            if (auth()->user()->id !== $char->user_id) {
                return redirect('/party')->with('error', 'Unauthorized Page');
            }
            return view('party.edit')->with('char', $char)->with('user', $user);
        } else {
            return redirect('/party')->with('error', "Character doesn't exist");
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
        // Validate input
        $this->validate($request, [
            'name' => 'required',
            'player' => 'required',
            'ac' => 'nullable',
            'hp' => 'nullable',
            'pp' => 'nullable',
            'speed' => 'nullable',
            'active' => 'required',
            'str' => 'nullable',
            'dex' => 'nullable',
            'con' => 'nullable',
            'int' => 'nullable',
            'wis' => 'nullable',
            'cha' => 'nullable',
            'saving_throws' => 'nullable',
            'skills' => 'nullable',
            'damage_vulnerabilities' => 'nullable',
            'damage_resistances' => 'nullable',
            'condition_immunities' => 'nullable',
            'senses' => 'nullable',
            'languages' => 'nullable',
            'abilities' => 'nullable',
            'actions' => 'nullable',
            'equipment' => 'nullable',
            'notes' => 'nullable',
            'portrait' => 'nullable|max:1999'
        ]);
        
        // Update post
        $char = Char::find($id);
        $char->name = $request->input('name');
        $char->player = $request->input('player');
        $char->ac = $request->input('ac');
        $char->hp = $request->input('hp');
        $char->pp = $request->input('pp');
        $char->speed = $request->input('speed');
        $char->status = $request->input('active');
        $char->str = $request->input('str');
        $char->dex = $request->input('dex');
        $char->con = $request->input('con');
        $char->int = $request->input('int');
        $char->wis = $request->input('wis');
        $char->cha = $request->input('cha');
        $char->saving_throws = $request->input('saving_throws');
        $char->skills = $request->input('skills');
        $char->damage_vulnerabilities = $request->input('damage_vulnerabilities');
        $char->damage_resistances = $request->input('damage_resistances');
        $char->condition_immunities = $request->input('condition_immunities');
        $char->senses = $request->input('senses');
        $char->languages = $request->input('languages');
        $char->abilities = $request->input('abilities');
        $char->actions = $request->input('actions');
        $char->equipment = $request->input('equipment');
        $char->notes = $request->input('notes');
        $char->save();
        return redirect()->route('character', ['id'=>$char->id])->with('success', 'Character Updated');
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
