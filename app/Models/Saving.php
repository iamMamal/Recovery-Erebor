<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    protected $fillable = ['amount','target_amount' , 'user_id','title','target_date'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(SavingTransaction::class);
    }
}
