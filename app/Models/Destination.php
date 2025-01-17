<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = ['destination', 'price', 'departure'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
