<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building', 'detail'];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    // last_name, first_name, emailで$keywordとの完全一致または部分一致で検索
    // last_nameとfirst_nameは別カラムのため、フルネームへの一致検索は現状不可
    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where(function($query) use ($keyword) {
                $query->where('last_name', '=', $keyword)
                      ->orWhere('last_name', 'like', '%' . $keyword . '%')
                      ->orWhere('first_name', '=', $keyword)
                      ->orWhere('first_name', 'like', '%' . $keyword . '%')
                      ->orWhere('email', '=', $keyword)
                      ->orWhere('email', 'like', '%' . $keyword . '%');
            });
        }
    }

    // デフォルトオプション「性別」→value=""、オプション「全て」→value=0
    // emptyでどちらもtrueが返るため絞り込み検索をスルー
    public function scopeGenderSearch($query, $gender)
    {
        if (!empty($gender)) {
            $query->where('gender', $gender);
        }
    }

    public function scopeCategorySearch($query, $category_id)
    {
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
    }

    public function scopeDateSearch($query, $date)
    {
        if (!empty($date)) {
            $query->where('created_at', 'like',  $date . '%');
        }
    }

}
