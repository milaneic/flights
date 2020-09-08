<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        return view('flights.index');
    }

    public function mail(Request $request)
    {
        // dd($request->all());
        $data = $request->validate(
            [
                'name' => ['required', 'string'],
                'email' => ['required', 'email'],
                'subject' => ['required'],
                'message' => ['required']
            ]
        );
        Mail::to('milaaneic@gmail.com')->send(new ContactUs($data));

        session()->flash('message', 'Your mail is sent!');
        return back();
    }
}
