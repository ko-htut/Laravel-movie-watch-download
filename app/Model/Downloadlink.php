<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Downloadlink extends Model
{
    protected $fillable = [
        'web_name',
        'web_url'
    ];
    public function downloadlinkable()
    {
        return $this->morphTo();
    }
    public function delete()
    {
        return parent::delete();
    }
}
