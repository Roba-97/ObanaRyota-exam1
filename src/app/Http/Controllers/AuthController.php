<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;
use App\Models\Category;

class AuthController extends Controller
{
    //
    public function index($modal = '')
    {
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();

        if(!empty($modal)) {
            $data = Contact::find($modal);
        }
        else {
            $data = null;
        }

        return view('admin', compact('contacts', 'categories', 'data'));
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

    public function destroy(Contact $contact) 
    {
        $contact->delete();
        return redirect('/admin');
    }
}
