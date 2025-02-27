<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMChannel extends Model
{
    use HasFactory;

    protected $fillable = ['dm_channel_id', 'sender_id', 'content'];

   public function dmChannel() {
       return $this->belongsTo(DMChannel::class);
   }

    public function sender() {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
