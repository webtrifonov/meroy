<?php

namespace App\Http\Controllers\ProjectControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class SinglePageController extends SiteController
{
   public function showAbout(){
   	return view('about');
   }
   public function showDelivery(){
   	$delivery_points = DB::select('SELECT * FROM `deliverypoints`');
   	return view('delivery', compact('delivery_points'));
   }
}
