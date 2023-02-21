<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


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
    //to check whether the course has any associated placement record.
    public function getPlacements()
    {
        return $this->hasMany(Placements::class,'course_id','course_id');
    }
    //to check whether the course has any associated awards record.
    public function getAwards()
    {
        return $this->hasMany(Awards::class,'course_id','course_id');
    }

    //for deleting the program_strucuture and timetable files while deleting course.
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($course) {
            $timetables = $course->timetable;
            $program_structures = $course->program_strucuture;
            foreach ($timetables as $timetable) {
                Storage::disk('public')->delete($timetable->file_name);
            }
            foreach ($program_structures as $program_structure) {
                Storage::disk('public')->delete($program_structure->file_name);
            }

            #also deleting its cover image
            Storage::disk('public')->delete($course->cover_img_path);

            $course->timetable()->delete();
            $course->program_strucuture()->delete();
        });
    }
}
