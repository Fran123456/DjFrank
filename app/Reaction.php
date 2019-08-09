<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    protected $fillable = ['episode_id','user_id','reaction'];

    /**
     * Reaction belongs to .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public static function get_reaction($episode){
       $reactions = array('like', 'love', 'haha', 'wow', 'sad', 'angry');
    	//like love haha wow sad angry
       $reactionList= array();

       for ($i=0; $i <count($reactions) ; $i++) { 
       	 $reactionList[$reactions[$i]] = count(Reaction::where('episode_id', $episode)->where('reaction', $reactions[$i])->get());
       }
         
    	// $reactions = count($reactions);
    	 return $reactionList;
    }
    public static function my_reaction($episode, $user){
     $my = Reaction::where('episode_id', $episode)->where('user_id', $user)->first();
     return $my;
    }
    
}
