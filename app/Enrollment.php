<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{	
	protected $fillable = ['course_id', 'user_id',];
	
    public function course()
    {
      return $this->belongsTo(Course::class);
    }
}
