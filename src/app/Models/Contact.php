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

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('email', 'like', '%' . $keyword . '%');
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
