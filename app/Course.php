<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Goal;
use App\Level;
use App\Review;
use App\Requirement;
use App\Student;
use App\Administrator;
class Course extends Model
{
    const PUBLISHED = 1;
    const PENDING = 2;
    const REJECTED = 3;

    protected $withCount = ['reviews', 'students'];

    /**
     * Course belongs to .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pathAttachment(){
        return "/storage/courses/".$this->picture;
    }

    public function getRouteKeyName(){
        return 'slug';
    }
    

    public function category()
    {
    	// belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
    	return $this->belongsTo(Category::class);
    }

    /**
     * Course has many Sections.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sections()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = course_id, localKey = id)
        return $this->hasMany(Section::class);
    }

    /**
     * Course has many Episodes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function episodes()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = course_id, localKey = id)
        return $this->hasMany(Episode::class);
    }

    /**
     * Course has many .
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function goals()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = course_id, localKey = id)
    	return $this->hasMany(Goal::class);
    }

    /**
     * Course belongs to Level.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function level()
    {
    	// belongsTo(RelatedModel, foreignKey = level_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Level::class);
    }

    /**
     * Course has many Reviews.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = course_id, localKey = id)
    	return $this->hasMany(Review::class);
    }

    /**
     * Course has many Requirements.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requirements()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = course_id, localKey = id)
    	return $this->hasMany(Requirement::class);
    }

    /**
     * Course belongs to Students.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function students()
    {
    	//belongsToMany(RelatedModel, foreignKey = students_id, keyOnRelatedModel = id)
    	return $this->belongsToMany(Student::class);
    }

    /**
     * Course belongs to Administrator.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function administrator()
    {
        // belongsTo(RelatedModel, foreignKey = administrator_id, keyOnRelatedModel = id)
        return $this->belongsTo(Administrator::class);
    }

    public function getRatingAttribute(){
        return $this->reviews->avg('rating');
    }

    public function relatedCourses(){
        return Course::with('reviews')->whereCategoryId($this->category->id)
        ->where('id','!=', $this->id)
        ->latest()
        ->limit(6)
        ->get();
    }
    
}
