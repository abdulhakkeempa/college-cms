<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStructure extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'program_structures';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    public $timestamps = false;

    protected $fillable = [
        'course_id',
        'program_structure_year'
    ];
}
