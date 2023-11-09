<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'product_id', 'category','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
