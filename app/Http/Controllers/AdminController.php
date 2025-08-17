<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
          public function adminMenu()
    {
        return view('admin.menu');
    }
}
