<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Embed extends Model
{
    protected $fillable = [
        'web_name',
        'web_url'
    ];
    public function embedable()
    {
        return $this->morphTo();
    }
    public function delete()
    {
        return parent::delete();
    }
}
