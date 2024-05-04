<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function payments()
    {
        return $this->hasManyThrough(Payment::class, Registration::class);
    }

    public function testmarks()
    {
        return $this->hasManyThrough(Testmark::class, Registration::class);
    }

    public function attendances()
    {
        return $this->hasManyThrough(Attendance::class, Registration::class);
    }

    public function registration()
    {
        return $this->hasOne(Registration::class);
    }

    // TODO: refactor this methods
    public function tuitionClasses()
    {
        return $this->belongsToMany(TuitionClass::class, 'registrations');
    }

    public function activeTuitionClass()
    {
        return $this->tuitionClasses()->where('active', true)->first();
    }

    public function activeRegistration()
    {
        return $this->registrations()
            ->whereHas('tuitionClass', function ($query) {
                $query->where('active', true);
            })
            ->first();
    }
}
