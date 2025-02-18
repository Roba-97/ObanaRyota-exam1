<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;
use App\Models\Category;

class AuthController extends Controller
{
    //
    public function index()
    {
        $contacts = Contact::with('category')->paginate(7);        
        //dd($contacts);
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }

    public function search(Request $request) 
    {
        $contacts = 
        Contact::with('category')
        ->keywordSearch($request->keyword)
        ->genderSearch($request->gender)
        ->categorySearch($request->category_id)
        ->dateSearch($request->date)
        ->paginate(7);
        //ローカルスコープをつなげて検索、最後にページネーション

        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }

    public function modal(Request $request, Contact $contact)
    {
        $data = $contact->load('category');

        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories', 'data'));
    }

    public function destroy(Contact $contact) {
        $contact->delete();
        return redirect('/admin');
    }
}
