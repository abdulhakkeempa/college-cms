<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function getPhotos()
    {
        return $this->hasMany(Photos::class,'album_id','album_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($album) {
            $photos = $album->getPhotos;
            foreach ($photos as $photo) {
                Storage::delete($photo->photo_file_path);
            }
            $album->getPhotos()->delete();
        });
    }
}
