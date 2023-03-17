<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
   // Show register/create form
   public function create() {
      return view("users.register");
   }

   // Create new user
   public function store(Request $request) {
      $formFields = $request->validate([
         "name" => ["required", "min:3"],
         "email" => ["required", "email", Rule::unique("users", "email")],
         "password" => ["required", "confirmed", "min:6"]
      ]);

      $formFields["password"] = bcrypt($formFields["password"]);
      $user = User::create($formFields);

      auth()->login($user);

      return redirect("/")->with("message", "User created and logged in");
   }

   // Logout the user
   public function logout(Request $request){
      auth()->logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect("/")->with("message", "You have been logged out");
   }

   // Show login form
   public function login(){
      return view("users.login");
   }
}
