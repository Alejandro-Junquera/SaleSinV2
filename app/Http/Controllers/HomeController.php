<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function verify($code)
    {
    $user = User::where('code', $code)->first();

    if (! $user)
        return redirect('/');

    $user->actived = true;
    $user->code = null;
    $user->save();

    return redirect('/home');
}

}
