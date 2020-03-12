<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $fillable = [
        'category_id', 'name', 'copy', 'author', 'publisher', 'image',
    ];

    public function category(){
    	return $this->belongsTo(category::class);
    }
}
