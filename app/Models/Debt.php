<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    protected $fillable = ['title','total_amount' , 'user_id','description','start_date','is_settled','type'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function installments()
    {
        return $this->hasMany(Installment::class);
    }
}
