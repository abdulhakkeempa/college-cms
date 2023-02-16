<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumCover extends Model
{
    use HasFactory;

    //primaryKey
    protected $primaryKey = 'album_id';

    //table name
    protected $table = 'album_cover';
    public $timestamps = false;

    protected $fillable = [
        'album_id',
        "photo_id"
    ];
    /*
      To fetch the photo using the album cover object.
    */
    public function getPhoto()
    {
        return $this->belongsTo(Photos::class,"photo_id","photo_id");
    }

}
