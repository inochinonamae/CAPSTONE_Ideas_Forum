<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVote extends Model
{
    use HasFactory;

    protected $table = 'user_votes';

    protected $fillable = [
        'user_id',
        'lihkg_id',
    ];

     
}