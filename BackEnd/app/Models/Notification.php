<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'read', 'student_id']; 
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
