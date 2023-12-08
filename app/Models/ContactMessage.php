<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;
    //definition the fillable field form table contact-message
    protected $fillable = ['name',
                           'email',
                           'message'];
}
