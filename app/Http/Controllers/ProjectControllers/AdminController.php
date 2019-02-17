<?php

namespace App\Http\Controllers\ProjectControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends SiteController
{
    public function show()
    {
        return view('admin.admin');
    }
}
