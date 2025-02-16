<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ContactRequest;

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

    public function confirm(ContactRequest $request)
    {
      $contact = $request->all();
	  $category = Category::find($request->category_id);

      // 番号の作り直し
      $tel = $contact['tel-1'].$contact['tel-2'].$contact['tel-3'];

      // 作り直した番号とリクエストデータをまとめ、保存できる形に
      unset($contact['tel-1'], $contact['tel-2'], $contact['tel-3']);
      $fixedcontact = $contact + array('tel'=> $tel);

      return view('confirm', ['contact' => $fixedcontact, 'category' => $category]);
    }

    public function store(Request $request)
    {
      return view('thanks');
    }
}
