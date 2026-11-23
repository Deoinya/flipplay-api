<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = [
        'title',
        'status',
        'episode_count',
        'rating',
    ];

    protected $casts = [
        'episode_count' => 'integer',
        'rating' => 'float',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
