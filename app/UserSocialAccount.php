<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSocialAccount extends Model
{
    //
    /**
     * UserSocialAccount belongs to User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['user_id','provider','provider_uid'];



    public function user()
    {
    	// belongsTo(RelatedModel, foreignKey = user_id, keyOnRelatedModel = id)
    	return $this->belongsTo(User::class);
    }
}
