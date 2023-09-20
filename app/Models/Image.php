<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'path',
        'article_id',
        ];
    
    //一つの画像に対してhあ一つの記事
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
