<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMChannel extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function message() {
        return $this->hasMany(DirectMessage::class);
    }

    public function participants() {
        return $this->belongsTo(User::class, 'dm_channel_id');
    }
}
