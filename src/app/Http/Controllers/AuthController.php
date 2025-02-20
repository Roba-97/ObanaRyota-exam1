<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Contact;
use App\Models\Category;

use Carbon\Carbon;

class AuthController extends Controller
{
    //
    public function index()
    {
        $url = session()->get('url');
        if(!empty($url)) {
            session()->forget('url');
        }
  
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }

    public function search(Request $request) 
    {
        session()->put('url', url()->full());

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

        $url = session()->get('url');
        if (is_string($url)) {
            return redirect($url);
        } else {
            return redirect('/admin'); // セッションに URL が無いか無効な場合
        }
    }

    public function export(Request $request)
    {
        $contacts = 
        Contact::with('category')
        ->keywordSearch($request->keyword)
        ->genderSearch($request->gender)
        ->categorySearch($request->category_id)
        ->dateSearch($request->date)
        ->get();

        $count = Contact::count();
        $now = new Carbon();
        
        if ($count === $contacts->count()) {
            $filename = "お問い合わせ一覧_" . $now->format('Y年m月d日'). ".csv";
        }
        else {
            $filename = "お問い合わせ検索_" . $now->format('Y年m月d日'). ".csv";
        }
    
        $csvHeader = [
            'ID','姓','名','性別','メールアドレス','電話番号','住所','建物名','お問い合わせの種類','お問い合わせ内容'
        ];
        $temps = [];
        array_push($temps, $csvHeader);
    
        foreach ($contacts as $contact) {
            switch($contact->gender) {
                case(1):
                    $gender = '男性';
                    break;
                case(2):
                    $gender = '女性';
                    break;
                case(3):
                    $gender = 'その他';
                    break;
                default:
                    break;
            }
            // deteilカラム内の改行は半角スペースに→csvでの表示を1行に
            $detail = str_replace("\n", " ", $contact->detail);

            $temp = [
                $contact->id,
                $contact->last_name,
                $contact->first_name,
                $gender,
                $contact->email,
                $contact->tel,
                $contact->address,
                $contact->building,
                $contact->category->content,
                $detail,
                ];
            array_push($temps, $temp);
        }

        $stream = fopen('php://temp', 'r+b');
        foreach ($temps as $temp) {
            fputcsv($stream, $temp);
        }
        rewind($stream);
        $csv = str_replace(PHP_EOL, "\r\n", stream_get_contents($stream));
        $csv = mb_convert_encoding($csv, 'SJIS-win', 'UTF-8');
        fclose($stream);

        return response($csv ,200)
        ->header('Content-Type', 'text/csv')
        ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }
}
