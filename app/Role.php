<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ADMIN = 1;
    const STUDENT =2;

   

    /**
     * Role has many User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = role_id, localKey = id)
    	return $this->hasMany(User::class);
    }
}

 
