<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

    public function export()
    {
        $contacts = Contact::with('category')->get();
    
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
                $contact->detail,
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
        ->header('Content-Disposition', 'attachment; filename="お問い合わせ一覧.csv"');;
    }
}
