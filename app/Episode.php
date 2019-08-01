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
        $nEpisodes = count($orders);
        if($next == null && $previous == null && $nEpisodes >= 3) $random = 3;
        elseif($next == null && $previous == null && $nEpisodes < 3) $random = $nEpisodes;
        elseif($next == null && $previous != null && $nEpisodes >= 3) $random = 2;
        elseif($next == null && $previous != null && $nEpisodes < 3) $random = $nEpisodes-1;
        elseif($next != null && $previous == null && $nEpisodes >= 3) $random = 2;
        elseif($next != null && $previous == null && $nEpisodes < 3) $random = $nEpisodes-1;
        elseif($next != null && $previous != null && $nEpisodes >= 3) $random = 1;
        elseif($next != null && $previous == null && $nEpisodes < 3) $random = $nEpisodes-2;

      $collection = collect([]);
         foreach ($orders as $key => $value) $collection->push($value);
            
      $help = array($next, $previous);
      $con = 0;
    /*  while ($random != 0) {
        $n = $collection->random();
        $win = 0;
        if($n->orderEpisode != $orderEpisodeActually) $win++;
        elseif($next != null){
            if($n->orderEpisode != $next->orderEpisode) $win++;
        }elseif($previous != null){
            if($n->orderEpisode != $previous->orderEpisode) $win++;
        }elseif($previous == null) $win++;
        elseif($next == null) $win++;

        if($win == 3){
            $random--;
            $help[$con+2] = $n;
            $con++;
        }
      }*/


      for ($i=0; $i <count($help) ; $i++) { 
          if($help[$i] != null){
            echo $help[$i]->title . "<br>";
          }
      }

  
      
    /*  if($next != null)print_r($next->title);
      echo "<br>";
      print_r($orderEpisodeActually);
      echo "<br>";
      if($previous != null)print_r($previous->title);
      echo "<br>";
      echo $random;*/
       
   }
}
