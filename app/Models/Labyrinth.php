<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Labyrinth extends Model
{
    protected $fillable = ['user_id','start_x','end_x','start_y','end_y','labyrinth'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
