<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinanceLogs extends Model
{
  public $tables = 'finance_logs';
  public $incrementing = false;

  public function agency()
  {
      return $this->belongsTo('App\Agencies');
  }

  public function income()
  {
      return $this->belongsTo('App\Incomes', 'incomes_id');
  }

  public function expense()
  {
      return $this->belongsTo('App\Expenses', 'expenses_id');
  }

}
