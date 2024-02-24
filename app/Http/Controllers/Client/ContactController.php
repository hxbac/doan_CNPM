<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Show contact page
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index() {
        return view('client.contact.index');
    }

    /**
     * Handle add contact
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        Contact::create([
            "name" => $request->name,
            "email" => $request->email,
            "message" =>$request->message
        ]);
        return view('client.contact.index');
    }
}
