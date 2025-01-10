<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class signupController extends Controller
{
    public function create(){
        return view('auth.signup');
    }
}
