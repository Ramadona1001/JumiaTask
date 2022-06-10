<?php

namespace Trips\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use Stations\Models\Stations;

class Seats extends Model
{
    protected $table = 'seats';

    public function fromStation()
    {
        return $this->belongsTo(Stations::class, 'from');
    }

    public function toStation()
    {
        return $this->belongsTo(Stations::class, 'to');
    }
}
