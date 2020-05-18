<?php

namespace MVS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChecklistCategory extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'is_active'];

    public function checklists()
    {
    	return $this->hasMany(\MVS\Checklist::class, 'category_id');
    }
}