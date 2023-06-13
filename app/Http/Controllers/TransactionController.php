<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return view('operator.transaction',["title" =>"transaction","color" => "#0000"]);
    }
}
