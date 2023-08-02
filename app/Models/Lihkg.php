<?php

namespace App\Models;

use App\Events\IdeasCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Lihkg extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
    ];

    protected $dispatchesEvents = [
        'created' => IdeasCreated::class,
    ];

    public function upvotes(): HasMany
    {
        return $this->hasMany(Upvote::class);
    }

    public function downvotes(): HasMany
    {
        return $this->hasMany(Downvote::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function upvote(): void
    {
        $this->increment('voteup');
    }

    public function downvote(): void
    {
        $this->increment('votedown');
    }

    public function replies()
{
    return $this->hasMany(Reply::class, 'lihkgs_id');
}
}