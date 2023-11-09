<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'category',
    ];
    public function feedback()
    {
        return $this->hasMany(FeedBack::class,'product_id');
    }
}
