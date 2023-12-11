<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Recipe;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //relation one-to -many with recipes
public function recipes()
{
    return $this->hasMany(Recipe::class);
}


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'admin',
        'daily_calorie_target'
    ];

  // User.php (Model)

public function scopeSearch($query, $term)
{
    if ($term) {
        $query->where(function($subquery) use ($term) {
            $subquery->where('username', 'like', "%{$term}%")
                     ->orWhere('email', 'like', "%{$term}%");
        });
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

        //needed to return user id to calorycontroller
    public function calories()
        { 
            return $this->hasMany(Calory::class);
        }
}
