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

    public function confirm(Request $request)
    {
      $contact = $request->all();

      // 番号の作り直し
      $tel = $contact['tel-1'].$contact['tel-2'].$contact['tel-3'];

      // 作り直した番号とリクエストデータでデータ保存へ
      unset($contact['tel-1'], $contact['tel-2'], $contact['tel-3']);
      $fixedcontact = $contact + array('tel'=> $tel);

      return view('confirm', ['contact' => $fixedcontact]);
    }

    public function store()
    {
      return view('thanks');
    }
}
