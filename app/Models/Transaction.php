<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['amount','account_id' , 'user_id','description','category_id','transaction_date'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
