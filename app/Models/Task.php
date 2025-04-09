<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $rules = [
        'newTaskTitle' => 'required|min:3|max:255',
        'newTaskCategory' => 'required|in:official,personal,others', // Category is required and validated
    ];
    protected $fillable =
    [
        'title',
        'category', 
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}

}
