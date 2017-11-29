<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incomes extends Model
{
  public $tables = 'incomes';
  public $incrementing = false;

  public function financelog()
  {
      return $this->hasOne('App\FinanceLogs');
  }
}
