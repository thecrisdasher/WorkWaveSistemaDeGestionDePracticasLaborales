<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;

class estudiantePrincipalController extends Controller
{
    public function index()
    {
        return view('principal-window-user.principal-window-student');

    }

}
