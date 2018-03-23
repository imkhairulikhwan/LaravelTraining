<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function __invoke()
    {
        // echo 'hubungi kami';
        return view('pages.contact-us');
    }
}
