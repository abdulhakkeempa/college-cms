<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Awards extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'awards';

    //overwriting the default setting to avoid insertion of timestamp to db.
    public $timestamps = false;
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'award_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_name',
        'course_id',
        'award_desc',
        'batch',
    ];

    //to fetch the course name
    public function getCourse()
    {
        return $this->belongsTo(Courses::class,"course_id","course_id");
    }
}
