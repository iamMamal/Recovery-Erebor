<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EliBotMessage extends Model
{
    protected $fillable = [
        'user_id',
        'message',
        'response',
        'context'
    ];

//    protected $casts = [
//        'context' => 'array',
//    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
