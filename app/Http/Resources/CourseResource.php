<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return [
        'id' => $this->id,
        'course_name' => $this->course_name,
        'course_code' => $this->course_code,
        'created_at' => (string) $this->created_at,
        'updated_at' => (string) $this->updated_at,
       
        
      ];
    }
}
