<?php

namespace App;
use App\User;
use App\Course;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * Review belongs to Course.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
  /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['course_id','user_id','rating', 'comment'];

    public function course()
    {
    	// belongsTo(RelatedModel, foreignKey = course_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Course::class);
    }

    /**
     * Review belongs to User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
    	// belongsTo(RelatedModel, foreignKey = user_id, keyOnRelatedModel = id)
    	return $this->belongsTo(User::class);
    }
}
