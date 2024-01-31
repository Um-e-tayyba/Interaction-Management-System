<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InteractionLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'interaction_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function interaction()
    {
        return $this->belongsTo(Interaction::class);
    }
}
