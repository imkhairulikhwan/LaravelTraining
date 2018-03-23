<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function details(Request $request)
    {   
        return view('pages.about-us');
        //echo 'berkenaan kami';
    }
    //
}
