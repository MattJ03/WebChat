<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'server_id'];

    public function server() {
        return $this->belongTo(Server::class);
    }

    public function messages() {
        return $this->hasMany(Message::class)
            ->orderBy('created_at');
    }

}
