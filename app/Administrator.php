<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
  
   /* The database table used by the model.
   *
   * @var string
   */
  protected $table = 'administrators';
   /**
    * Administrator has many Courses.
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function courses()
   {
   	// hasMany(RelatedModel, foreignKeyOnRelatedModel = administrator_id, localKey = id)
   	return $this->hasMany(Course::class);
   }

   /**
    * Administrator belongs to User.
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function user()
   {
   	// belongsTo(RelatedModel, foreignKey = user_id, keyOnRelatedModel = id)
   	return $this->belongsTo(User::class);
   }
}
