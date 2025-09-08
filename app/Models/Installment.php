<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    protected $fillable = ['debt_id', 'amount', 'due_date','is_paid'];
    public function debt()
    {
        return $this->belongsTo(Debt::class);
    }
}
