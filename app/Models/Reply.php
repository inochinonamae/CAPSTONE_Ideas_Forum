<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'replies';

    protected $fillable = [
        'reply',
        'user_id',
        'lihkgs_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lihkg()
    {
        return $this->belongsTo(Lihkg::class, 'lihkgs_id');
    }
 
}