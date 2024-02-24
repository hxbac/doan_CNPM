<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show home page
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index() {
        return view('client.home.index');
    }
}
