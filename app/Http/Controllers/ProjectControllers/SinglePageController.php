<?php

namespace App\Http\Controllers\ProjectControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class SinglePageController extends SiteController
{
    public function showAbout()
    {
    	return view('about');
    }
    public function showDelivery()
    {
        $delivery_points = DB::table('delivery_points')->get();
        return view('delivery', compact('delivery_points'));
    }
    public function showContacts()
    {
        return view('contacts');
    }
    public function postContacts(ContactRequest $request)
    {
        //$validated = $request->validated();
        //dump($validated);
        //$errors = $
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'theme' => $request->theme,
            'message' => $request->message
        ]);
        return back();
    }
}
