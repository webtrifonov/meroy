<?php

namespace App\Http\Controllers\ProjectControllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Validator;

class SinglePageController extends SiteController
{
    public function showAbout()
    {
    	return view(env('THEME').'.about');
    }
    public function showDelivery()
    {
        $delivery_points = DB::table('delivery_points')->get();
        return view(env('THEME').'.delivery', compact('delivery_points'));
    }
    public function showContacts()
    {
        return view(env('THEME').'.contacts');
    }
    public function sendMessage(ContactRequest $request)
    {
        //$validated = $request->validated();
        //dump($validated);
        //$errors = ...
        //dd($validator);
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'theme' => $request->theme,
            'message' => $request->message
        ]);
        return back();
    }
}
