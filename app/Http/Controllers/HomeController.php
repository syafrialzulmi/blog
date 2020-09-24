<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $name = request('name');
        // return view('home', ['name' => $name]);
        $name = 'zulmi';
        // ['name' => $name]
        return view('home', compact('name'));
    }
}
