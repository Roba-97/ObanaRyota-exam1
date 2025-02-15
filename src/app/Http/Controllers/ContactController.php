<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    //
    public function index()
    {
      $categories = Category::all();
      
      return view('index', compact('categories'));
    }

    public function confirm()
    {
      return view('confirm');
    }

    public function store()
    {
      return view('thanks');
    }
}
