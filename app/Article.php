<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'id','category_id','user_id', 'title','short_text','full_text','author',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
