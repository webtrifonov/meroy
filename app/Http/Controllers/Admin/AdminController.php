<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
class AdminController extends Controller
{
    public function show()
    {
        $contacts = Contact::all();
        return view('admin.admin', compact('contacts'));
    }
}
