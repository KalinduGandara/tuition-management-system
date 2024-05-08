<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuitionClass extends Model
{
    use HasFactory;

    protected $fillable = ['grade', 'year', 'center_id'];
    public function center()
    {
        return $this->belongsTo(Center::class);
    }


    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function classdays()
    {
        return $this->hasMany(ClassDay::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }
}
