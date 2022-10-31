<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\cicles;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users',User::all());
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
            'actived'=>'required',
        ]);
  
        $user->update($request->all());
  
        return redirect()->route('users.index')
                        ->with('success','user updated successfully');
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
        ->with('success','user deleted successfully');
    }
    public function softDestroy($id)
    {
        $users = User::find($id);
        $users->deleted = '1';
        $users->save();
        return redirect()->route('users.index')
        ->with('success','user deleted successfully');
    }
    public function activate($id)
    {
        $users = User::find($id);
        $users->actived = '1';
        $users->save();
        return redirect()->action([UserController::class, 'index']);
    }

    public function disable($id)
    {
        $users = User::find($id);
        $users->actived = '0';
        $users->save();
        return redirect()->action([UserController::class, 'index']);
    }
}
