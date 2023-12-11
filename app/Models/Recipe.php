<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{
    use HasFactory;

    //relation many to one with user
    public function user()
{
    return $this->belongsTo(User::class);
}
// relation with ratings one to many
public function ratings()
{
    return $this->hasMany(Rating::class);
}
// calculate average rating for recipe
public function averageRating()
{
    return $this->ratings()->avg('rating') ?: 0;
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

    public function scopeSearch($query, $searchTerm)
    {
        if ($searchTerm) {
            $query->where(function($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')
                      ->orWhere('description', 'like', '%' . $searchTerm . '%');
            });
        }
    }
    
    
    public function scopeFilter($query, array $filters)
    {

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
    // to change the format of recipe total_time(for ex:02:22:00) to "2 hours 22 min" format
    public function getTotalTimeAttribute($value)
    {
        // Split the time into hours, minutes, and seconds
        list($hours, $minutes, $seconds) = explode(':', $value);

        $formattedTime = '';
        if ($hours > 0) {
            $formattedTime .= $hours . ' hours ';
        }
        if ($minutes > 0) {
            $formattedTime .= $minutes ;
        }

        return trim($formattedTime);
    }
    // to manage like or likes according to count of likes(0,1 like or 2,3,4 likes)
    public function likesCount()
{
    return $this->is_liked;
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


    /*Relationship One-to-Many between
     the Recipe model and the Comments model*/
    public function comments(): HasMany
    {
        //last
        return $this->hasMany(Comment::class)->latest();
    }


}




