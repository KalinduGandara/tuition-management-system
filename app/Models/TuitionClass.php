<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuitionClass extends Model
{
    use HasFactory;

    public function center()
    {
        return $this->belongsTo(Center::class);
    }


    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
