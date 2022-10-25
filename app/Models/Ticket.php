<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeProcessed()
    {
        return $this->where('status', true);
    }

    public function scopeUnprocessed()
    {
        return $this->where('status', false);
    }

}
