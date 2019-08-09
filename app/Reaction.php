<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
     public function courses()
     {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = category_id, localKey = id)
    	return $this->hasMany(Course::class);
     }
}
