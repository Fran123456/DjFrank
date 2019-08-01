<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    //
    /**
     * Episode belongs to Section.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function getRouteKeyName(){
        return 'slug';
    }

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


    public static function __smart($orderEpisodeActually , $section){
       $orders = Episode::where('section_id' , $section)->orderBy('orderEpisode')->get();
       $next = null; $previous = null; $random =0;
       foreach ($orders as $key => $value) {
           if($value->orderEpisode> $orderEpisodeActually){
            $next =  $value;
            break;
           }
       }
       foreach ($orders as $key => $value) {
           if($orderEpisodeActually > 1){
              if($value->orderEpisode == ($orderEpisodeActually-1)){
                $previous = $value;
                break;
              }
           }
        }

      //$collection = collect([]);
      //foreach ($orders as $key => $value) $collection->push($value);

      $help = array($next, $previous);
      return $help;

   }
}
