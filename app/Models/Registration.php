<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'tuition_class_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function tuitionClass()
    {
        return $this->belongsTo(TuitionClass::class);
    }

    public function testmarks()
    {
        return $this->hasMany(Testmark::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
