<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
  public $tables = 'expenses';
  public $incrementing = false;

  public function financelog()
  {
      return $this->belongsTo('App\FinanceLogs');
  }
}
