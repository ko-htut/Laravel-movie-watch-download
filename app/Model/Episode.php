<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Episode extends Model
{
    use HasSlug;
    protected $fillable = ['title', 'slug'];
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
    public function season()
    {
        return $this->belongsTo(Season::class);
    }
    public function embeds()
    {
        return $this->morphMany(Embed::class, 'embedable');
    }
    public function watchlinks()
    {
        return $this->morphMany(Watchlink::class, 'watchlinkable');
    }
    public function downloadlinks()
    {
        return $this->morphMany(Downloadlink::class, 'downloadlinkable');
    }
    public function trailerlinks()
    {
        return $this->morphMany(Trailerlink::class, 'trailerlinkable');
    }
    public function delete()
    {
        return parent::delete();
    }
}
