<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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
        $users = User::inPostcode(auth()->user()->postcode)->where('help_type', '0')->get()->filter(function ($user) {
            return $user->id !== auth()->user()->id;
        });

        return view('home', compact('users'));
    }

    public function update()
    {
        auth()->user()->update(['help_info' => preg_replace('#<script(.*?)>(.*?)</script>#is', '', request()->get('help_info'))]);

        return redirect()->back();
    }
}
