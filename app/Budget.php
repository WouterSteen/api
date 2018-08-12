<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    /**
     * Get the accounts for the budget.
     */
    public function accounts()
    {
        return $this->hasMany('App\Account');
    }

}