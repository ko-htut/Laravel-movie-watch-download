<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Trailerlink extends Model
{
    protected $fillable = [
        'web_name',
        'web_url'
    ];
    public function trailerlinkable()
    {
        return $this->morphTo();
    }
    public function delete()
    {
        return parent::delete();
    }
}
