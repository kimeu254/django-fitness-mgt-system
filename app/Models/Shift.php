<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shift extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function trainer(): BelongsTo
    {
        return $this->belongsTo(Trainer::class);
    }
}
