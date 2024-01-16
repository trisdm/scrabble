<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Leaderboard extends Model
{
    use HasFactory;

    public function users() : BelongsTo  {

        return $this->belongsTo(User::class);
    }
}
