<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agencies extends Model
{
  public $tables = 'agencies';
  public $incrementing = false;

  public function users()
  {
      return $this->hasMany('App\User');
  }

  public function financelogs()
  {
      return $this->hasMany('App\FinanceLogs');
  }

  public function agencycategory()
  {
      return $this->belongsTo('App\AgencyCategories', 'agency_categories_id');
  }

}
