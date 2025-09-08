<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavingTransaction extends Model
{
    protected $fillable = ['amount','type' , 'saving_id','description'];
    
    public function savingRelation()
    {
        return $this->belongsTo(Saving::class, 'saving_id');
    }
}
