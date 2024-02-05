<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Labyrinth extends Model
{
    protected $fillable = ['user_id','start_x','end_x','start_y','end_y','labyrinth'];
    const TYPES = [
      'filled' => 0,
      'empty' => 1
    ];
    protected $casts = [
      "labyrinth" => 'array'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
