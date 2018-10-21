<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Season extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $fillable = ['season_nr'];
    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('posterSeason')
            ->singleFile();
    }
}
