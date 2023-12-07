<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;

    //relation many to one with user
    public function user()
{
    return $this->belongsTo(User::class);
}



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'images',
        'description',
        'total_calories',
        'total_time',
        'category',
        'is_liked',
    ];
    public function scopeFilter($query, array $filters)
    {
        // تعديل هذا الجزء حسب احتياجاتك
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . $filters['tag'] . '%');
        }

        if ($filters['search'] ?? false) {
            $keywords = explode(' ', $filters['search']);

            foreach ($keywords as $keyword) {
                $query->where('title', 'like', '%' . $keyword . '%')
                    ->orWhere('ingredients', 'like', '%' . $keyword . '%')
                    ->orWhere('tags', 'like', '%' . $keyword . '%');
            }
        }
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}




