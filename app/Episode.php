<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    //
    /**
     * Episode belongs to Section.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function section()
    {
    	// belongsTo(RelatedModel, foreignKey = section_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Section::class);
    }

    /**
     * Episode belongs to Course.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
    	// belongsTo(RelatedModel, foreignKey = course_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Course::class);
    }
}
