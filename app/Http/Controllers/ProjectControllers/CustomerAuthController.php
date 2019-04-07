<?php

namespace App\Http\Controllers\ProjectControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerAuthController extends SiteController
{
    public function registration()
    {
        return view(env('THEME').'.registration');
    }
    public function authorization()
    {
        return 'authorization';
    }
}
