<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pin extends Model
{
    // Add user_id to fillable so it can be mass assigned
    protected $fillable = ['user_id', 'name', 'message'];

    /**
     * Define the relationship to the User model
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
