<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Placements extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'placements';

    //overwriting the default setting to avoid insertion of timestamp to db.
    public $timestamps = false;
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'placement_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_name',
        'course_id',
        'batch',
        'company',
        'job_role',
    ];

    //to fetch the course name
    public function getCourse()
    {
        return $this->belongsTo(Courses::class,"course_id","course_id");
    }
}
