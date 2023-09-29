<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class MailController extends Controller
{
    public function index()
    {
        return view('mail.resetpassword');
    }


}