<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class borrow extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'library_user_id', 'category_id', 'book_id', 'borrow_date', 'return_date', 'returned_date', 'over_due_fine', 'status',
    ];

    //relationship
    public function libraryUser(){
    	return $this->belongsTo(libraryUser::class);
    }

    public function book(){
    	return $this->belongsTo(book::class);
    }

    public function category(){
        return $this->belongsTo(category::class);
    }

    
}
