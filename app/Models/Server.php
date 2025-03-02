<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'server_id', 'owner_id'];

    public function owner() {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function member() {
      return $this->hasMany(User::class, 'server_member');
    }

    public function messages() {
       return $this->hasMany(Message::class);
    }

}
