<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class student extends Controller
{
    public function index(request $req){
        return $req;
    }
}
