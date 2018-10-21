<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Watchlink extends Model
{
    protected $fillable = [
        'web_name',
        'web_url'
    ];
    public function watchlinkable()
    {
        return $this->morphTo();
    }
    public function delete()
    {
        return parent::delete();
    }
}
