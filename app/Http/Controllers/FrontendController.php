<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{

    public function index() {
        $movies = Movie::latest()->where("status","publish")->get();
        if($movies !== null) {
            return view('Frontend.layouts.index', compact('movies'));
        } else {
            abort('404');
        }
    }

    // User Login
    public function login(){
        return view('Frontend.Auth.login');
    }

}
