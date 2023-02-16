<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumCover extends Model
{
    use HasFactory;

    //table name
    protected $table = 'album_cover';
    public $timestamps = false;

    protected $fillable = [
        'album_id',
        "photo_id"
    ];
}
