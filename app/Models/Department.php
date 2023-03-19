<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'hod', 'allocated_rooms', 'total_students', 'admin_id'];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function students(){
        return $this->hasMany(student::class);
    }
}

