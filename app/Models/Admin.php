<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone_number', 'address', 'gender', 'dob', 'image','token'];

    public function user() {
        return $this->morphOne(User::class, 'profile');
    }
    public function departments(){
        return $this->hasMany(Department::class);
    }
}

