<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use Laravel\Cashier\Billable;


class User extends Authenticatable 
{
    use Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

 
    protected $fillable = [
        'name', 'email', 'slug','picture','phone','role_id','password','stripe_id','card_brand','card_last_four','trial_ends_at','subscription_ends_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function navigation(){
        return auth()->check() ? auth()->user()->role->rol : "gest";

      //  return  auth()->user()->role;

    }

    /**
     * User belongs to Rol.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        // belongsTo(RelatedModel, foreignKey = rol_id, keyOnRelatedModel = id)
        return $this->belongsTo(Role::class);
    }

    /**
     * User has one Student.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function student()
    {
        // hasOne(RelatedModel, foreignKeyOnRelatedModel = user_id, localKey = id)
        return $this->hasOne(Student::class);
    }

    /**
     * User has one Administrator.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function administrator()
    {
        // hasOne(RelatedModel, foreignKeyOnRelatedModel = user_id, localKey = id)
        return $this->hasOne(Administrator::class);
    }

    /**
     * User has one SocialAccount.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function socialAccount()
    {
        // hasOne(RelatedModel, foreignKeyOnRelatedModel = user_id, localKey = id)
        return $this->hasOne(UserSocialAccount::class);
    }
}
