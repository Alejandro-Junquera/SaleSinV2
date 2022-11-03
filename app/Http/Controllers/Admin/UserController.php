<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users',User::paginate(11));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=auth()->user();
        if($user->id==$id){
            return redirect()->route('admin.users.index')->with('error','You cannot edit yourself');
        }
        return view('admin.users.edit')->with(['user'=>User::find($id)]);
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
        $user=User::find($id);
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
        ]);
  
        $user->update($request->all());
  
        return redirect()->route('admin.users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('users.index')
        ->with('success','User deleted successfully');
    }
    public function softDestroy($id)
    {
        $user=auth()->user();
        if($user->id==$id){
            return redirect()->route('admin.users.index')->with('error','You cannot delete yourself');
        }
        $users = User::find($id);
        $users->deleted = '1';
        $users->save();
        return redirect()->route('admin.users.index')
        ->with('success','User deleted successfully');
    }
    public function activate($id)
    {
        $user=auth()->user();
        if($user->id==$id){
            return redirect()->route('admin.users.index')->with('error','You cannot activate yourself');
        }
        $users = User::find($id);
        $users->actived = '1';
        $users->save();
        return redirect()->action([UserController::class, 'index']);
    }

    public function disable($id)
    {
        $user=auth()->user();
        if($user->id==$id){
            return redirect()->route('admin.users.index')->with('error','You cannot disabled yourself');
        }
        $users = User::find($id);
        $users->actived = '0';
        $users->save();
        return redirect()->action([UserController::class, 'index']);
    }
}
