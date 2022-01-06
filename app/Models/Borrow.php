<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Borrow extends Model
{
    use HasFactory;
    
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
    	return $this->belongsTo(LibraryUser::class);
    }

    public function book(){
    	return $this->belongsTo(Book::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    
}
