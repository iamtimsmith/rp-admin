<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function edit(User $user) {
        $user = Auth::user();
        $user_id = auth()->user()->id;
        return view('users.edit')->with('user', $user)->with('user_id', $user_id);
    }

    public function update(User $user) {
        $this->validate(request(), [
            //'name' => 'required',
            //'email' => 'required|email|unique:users',
            //'password' => 'min:6|confirmed'
        ]);

        if ( request('name') !== $user->name) {
        $user->name = request('name');
        }
    
        //if ( request ('email') !== $user->email) {
        //$user->email = request('email');
        //}
        //$user->password = bcrypt( request('password') );
        
        $user->theme = request('theme');
        $user->bg_image = request('bgImage');
        $user->detail_level = request('detail');
        $user->side_notes = request('side_notes');
        

        $user->save();
        
        return redirect()->route('users.edit', [$user->id])->with('success', 'Settings Updated');
    }

    public function deleteaccount(User $user) {
        $user = Auth::user();
        $user_id = auth()->user()->id;
        return view('users.delete')->with('user', $user)->with('user_id', $user_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user = Auth::user();

        Auth::logout();

        if ($user->delete()) {
            return redirect()->route('deleted');
        }
    }
}
