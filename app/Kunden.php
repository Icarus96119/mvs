<?php

namespace MVS;

use Illuminate\Database\Eloquent\Model;

class Kunden extends Model
{

  protected $fillable = [
      'vorname', 'nachname', 'user_id', 'anrede'
  ];


  public function myuser(){
    return $this->belongsTo('MVS\User','user_id');
  }

  public function checklists()
  {
    return $this->belongsToMany('MVS\Checklist', 'checklist_kunden', 'kunden_id', 'checklist_id');
  }
  public function ehepartnerChecklists()
  {
    return $this->belongsToMany('MVS\Checklist', 'checklist_ehepartner', 'kunden_id', 'checklist_id');
  }
}
