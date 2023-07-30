<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referency extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'sort',
        'parent_id'
    ];

    public $timestamps = false;

    public function children()
    {
        return $this->hasMany(Referency::class, 'parent_id', 'id')
                    ->orderBy('sort'); 
    }

    public function parent()
    {
        return $this->belongsTo(Post::class);
    }
}
