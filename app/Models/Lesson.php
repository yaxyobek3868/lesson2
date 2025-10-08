<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'text', 'kuni', 'soati'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
