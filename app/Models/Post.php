<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'description',
        'created_user_id',
        'updated_user_id',
        'deleted_user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'created_user_id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
