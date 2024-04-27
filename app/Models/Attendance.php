<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }

    public function classDay()
    {
        return $this->belongsTo(ClassDay::class);
    }
}
