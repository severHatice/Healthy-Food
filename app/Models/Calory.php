<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calory extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'food_item',
        'calories_number',
        'date',
        'time'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
