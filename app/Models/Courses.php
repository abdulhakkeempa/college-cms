<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'courses';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'course_id';
    public $timestamps = false;

    protected $fillable = [
        'course_name',
        'eligibility',
        'course_description',
        'fees',
        'year_started',
        'duration',
        'cover_img_path'
    ];

    public function program_strucuture()
    {
        return $this->hasMany(ProgramStructure::class,'course_id','course_id');
    }

    public function timetable()
    {
        return $this->hasMany(Timetable::class,'course_id','course_id');
    }
}
