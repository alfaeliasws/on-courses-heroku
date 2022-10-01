<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'picture',
        'tags',
        'price',
        'description',
    ];

    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false) {
            $query
                ->where('name','like','%' . request('search') . '%' )
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tag', 'like', '%' . request('search') . '%');
        }

        if($filters['tag'] ?? false) {
            $query
                ->where('tags','like','%' . request('tag') . '%' );
        }
    }
}
