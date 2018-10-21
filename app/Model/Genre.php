<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Genre extends Model
{
    use HasSlug;
    protected $fillable = [
        'name',
    ];
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    public function movies()
    {
        return $this->belongsToMany(Movie::class)->latest();
    }
    public function setGenreTypeAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }
}
