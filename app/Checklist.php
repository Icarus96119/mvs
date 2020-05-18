<?php

namespace MVS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checklist extends Model
{
    use SoftDeletes;
    protected $fillable = ['body', 'category_id', 'is_active'];

    public function category()
    {
        return $this->belongsTo(\MVS\ChecklistCategory::class);
    }

    public function kundens()
    {
      return $this->belongsToMany('MVS\Kunden', 'checklist_kunden', 'checklist_id', 'kunden_id');
    }    
    public function ehepartners()
    {
      return $this->belongsToMany('MVS\Kunden', 'checklist_ehepartner', 'checklist_id', 'kunden_id');
    }
}