<?php

namespace MVS;

use Illuminate\Database\Eloquent\Model;

class CustomerTimeline extends Model
{
	protected $table = "customer_timelines";
    protected $fillable = ['kundens_id', 'calculation_id', 'darlehen', 'zinsstaz', 'tilgung', 'laufzeit', 'rate_monatl', 'restschuld'];
}