<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    use HasFactory;
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'photos';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'photo_id';
    public $timestamps = false;
}
