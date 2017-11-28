<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgencyCategories extends Model
{
  public $tables = 'agency_categories';
  public $incrementing = false;

  public function agencies()
  {
      return $this->hasMany('App\Agencies');
  }
}
