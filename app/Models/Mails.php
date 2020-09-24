<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mails extends Model
{
    use HasFactory;

    protected $fillabe = [
        'from',
        'to',
        'subject',
        'message',
        'user_id',
        'images'
    ];

    
    public function user () {

        $this->belongsTo(User::class);
    }


}
