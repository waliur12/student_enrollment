<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{	

	protected $fillable = [ 'course_name', 'course_code'];
	
    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function enrollment()
    {
      return $this->hasMany(Enrollment::class);
    }
}
