<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'text',
        'profile_photo_path', 
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    //記事に対して
     public function articles()
    {
        return $this->hasMany(Article::class);
    }
    
    //記事に対するいいねに関して
    public function goods()
    {
        return $this->hasMany(Good::class);
    }
    
    //記事をいいねしたユーザがその記事のリソースを操作できるようにする
    public function good_articles()
    {
        return $this->belongsToMany(Article::class, 'goods', 'user_id', 'article_id');
    }
    
      public function is_good($articleId)
    {
        return $this->goods()->where('article_id', $articleId)->exists();
    }
    
    //ユーザーの情報を取得
    public function getByUser(int $limit_count = 5)
    {
         return $this->articles()->with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function relationships()
    {
        return $this->hasMany(Relationship::class);
    }
    
     public function follows()
    {
        return $this->belongsToMany(User::class, 'relationships', 'followed_id', 'user_id');
    }

    //フォローしているユーザー
    public function followers()
    {
        return $this->belongsToMany(User::class, 'relationships', 'user_id', 'followed_id');
    }
    
    //フォローされている
     public function relationship_users()
    {
        return $this->belongsToMany(User::class, 'relationships', 'user_id', 'followed_id');
    }
    
    
    
    //フォローしているかどうかの判断(followed_idにusesテーブルのidが入ってるかどうか)
    public function is_relationship($user)
    {
        return $this->relationships()->where('followed_id', $user)->exists();
    }
    
    //コメントについて
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    //記事の画像アップロードについて
    public function images()
    {
        return $this->hasMany(Image::class);
    }


}