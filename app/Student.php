<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;
class Student extends Model
{
    //

    /**
     * Student belongs to Courses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function courses()
    {
    	// belongsToMany(RelatedModel, foreignKey = courses_id, keyOnRelatedModel = id)
    	return $this->belongsToMany(Course::class);
    }

    /**
     * Student belongs to User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        // belongsTo(RelatedModel, foreignKey = user_id, keyOnRelatedModel = id)
        return $this->belongsTo(User::class);
    }
}
