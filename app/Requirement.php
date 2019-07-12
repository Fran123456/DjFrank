<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    /**
     * Requirement belongs to Course.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
    	// belongsTo(RelatedModel, foreignKey = course_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Course::class);
    }
}
