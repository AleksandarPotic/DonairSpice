<?php

namespace App\Http\Controllers\User;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.home');
    }

    public function contact(Request $request)
    {
        Mail::to('aleksandar1995potic@gmail.com')->send(new ContactMail());

        return redirect()->back();
    }
}
