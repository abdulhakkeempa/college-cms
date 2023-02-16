<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Album extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'albums';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'album_id';
    public $timestamps = false;

    protected $fillable = [
        'album_name'
    ];

    /*
        For fetching the cover photo of 'this' album.
    */
    public function coverPhoto()
    {
        return $this->hasOne(AlbumCover::class, 'album_id', 'album_id');
    }
    /*
        For fetching the images associated with 'this' album.
    */
    public function getPhotos()
    {
        return $this->hasMany(Photos::class,'album_id','album_id');
    }
    /*
        For removing the images in the storage folder,
        while removing the albums.
    */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($album) {
            $photos = $album->getPhotos;
            foreach ($photos as $photo) {
                Storage::disk('public')->delete($photo->photo_file_path);
            }
            $album->getPhotos()->delete();
        });
    }
}
