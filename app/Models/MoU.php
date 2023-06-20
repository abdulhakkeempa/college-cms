<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoU extends Model
{
    use HasFactory;
    protected $table = 'mou';

    //overwriting the default setting to avoid insertion of timestamp to db.
    public $timestamps = false;

    //The primary key associated with the table.
    protected $primaryKey = 'mou_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'year',
        'description',
    ];

}
