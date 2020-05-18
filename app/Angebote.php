<?php

namespace MVS;

use Illuminate\Database\Eloquent\Model;

class Angebote extends Model
{
    protected $table = 'angebote';
    protected $fillable = ['pdf_name', 'customer_id'];
    public $timestamps = false;
}
