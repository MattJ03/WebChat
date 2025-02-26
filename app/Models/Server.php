<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'owner_id'];

    public function owner() {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function channel() {
        return $this->hasMany(Channel::class);
    }

   public function messages() {
        return $this->hasMany(Message::class, Channel::class);
   }

   public function members() {
        return $this->hasMany(User::class, 'memberships')
            ->withTimestamps();
   }
}
