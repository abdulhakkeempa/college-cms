<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phd extends Model
{
    use HasFactory;
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'phds';
    protected $primaryKey = 'phd_id';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    public $timestamps = false;

    protected $fillable = [
        'scholar_name',
        'title',
        'guide',
        'awarded_date'
    ];
}
