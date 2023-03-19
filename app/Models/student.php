<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class student extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['student_name', 'guardians_name', 'email','address','gender','grade','marks','dob','phone_number','token','department_id'];

    public function user() {
        return $this->morphOne(User::class, 'profile');
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }
}

