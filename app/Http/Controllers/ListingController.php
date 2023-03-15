<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
   // Show all listings
   public function index() {
      return view("listings.index", [
         "listings" => Listing::latest()->filter(request(["tag", "search"]))->paginate(6)
      ]);
   }

   // Show single listing
   public function show(Listing $listing) {
      return view("listings.show", [
         "listing" => $listing 
      ]);
   }

   // Show create form
   public function create() {
      return view("listings.create");
   }

   // Store listing data
   public function store(Request $request) {
      $formFields = $request->validate(([
         "title" => "required",
         "company" => ["required", Rule::unique("listings", "company")],
         "location" => "required",
         "website" => "required",
         "email" => ["required", "email"],
         "tags" => "required",
         "description" => "required"
      ]));
      dd($request->logo);
      if($request->hasFile("logo")){
         $formFields["logo"] = $request->file("logo")->store("logos", "public");
      }

      Listing::create($formFields);
      return redirect("/")->with("message", "Listing created successfully");
   }
}
