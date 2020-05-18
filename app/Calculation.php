<?php

namespace MVS;

use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    protected $table = 'calculation';
    protected $fillable = ['pdf_name', 'customer_id'];
    public $timestamps = false;
}
