<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
   // Show register/create form
   public function create() {
      return view("users.register");
   }
}
