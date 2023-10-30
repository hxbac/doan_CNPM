<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Home page
     * @return view
     */
    public function index() {
        return view('client.home.index');
    }
}
