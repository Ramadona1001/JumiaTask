<?php

namespace Trips\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use Stations\Models\Stations;

class Trips extends Model
{
    protected $table = 'trips';

    public function fromStation()
    {
        return $this->belongsTo(Stations::class, 'from');
    }

    public function toStation()
    {
        return $this->belongsTo(Stations::class, 'to');
    }

    public function crossStation($value)
    {
        return Stations::findOrfail($value);
    }
}
