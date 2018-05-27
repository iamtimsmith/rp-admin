<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NPC;
use App\User;

class NpcsController extends Controller
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
        return view('npcs.index')->with('npcs', $user->npcs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('npcs.create');
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
            'race' => 'nullable',
            'gender' => 'nullable',
            'class' => 'nullable',
            'alignment' => 'nullable',
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
        $npc = new NPC;
        $npc->name = $request->input('name');
        $npc->race = $request->input('race');
        $npc->gender = $request->input('gender');
        $npc->class = $request->input('class');
        $npc->alignment = $request->input('alignment');
        $npc->affiliation = $request->input('affiliation');
        $npc->notes = $request->input('notes');
        $npc->user_id = auth()->user()->id;
        $npc->portrait = $filenameToStore;

        $npc->save();
        return redirect()->route('npc', ['id'=>$npc->id])->with('success', 'NPC Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $npc = NPC::find($id);
        if ( isset($npc) ) {
            if (auth()->user()->id !== $npc->user_id) {
                return redirect('/npcs')->with('error', 'Unauthorized Page');
            }
            return view('npcs.show')->with('npc', $npc);
        } else {
            return redirect('/npcs')->with('error', "NPC doesn't exist.");
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
        $npc = NPC::find($id);
        if ( isset($npc) ) {
            if (auth()->user()->id !== $npc->user_id) {
                return redirect('/npcs')->with('error', 'Unauthorized Page');
            }
            return view('npcs.edit')->with('npc',$npc);
        } else {
            return redirect('/npcs')->with('error', "NPC doesn't exist.");
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
            'name' => 'required',
            'race' => 'nullable',
            'gender' => 'nullable',
            'class' => 'nullable',
            'alignment' => 'nullable',
            'affiliation' => 'nullable',
            'notes' => 'nullable'
        ]);
        // Update post
        $npc = NPC::find($id);
        $npc->name = $request->input('name');
        $npc->race = $request->input('race');
        $npc->gender = $request->input('gender');
        $npc->class = $request->input('class');
        $npc->alignment = $request->input('alignment');
        $npc->affiliation = $request->input('affiliation');
        $npc->notes = $request->input('notes');
        $npc->save();
        return redirect()->route('npc', ['id'=>$npc->id])->with('success', 'NPC Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $npc = NPC::find($id);
        
        //Check for correct user
        if(auth()->user()->id !== $npc->user_id) {
            return redirect('/npcs')->with('error', 'Unauthorized Page');    
        }

        $npc->delete();
        return redirect('/npcs')->with('success', 'NPC Removed');
    }
}
