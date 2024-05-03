<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_id',
        'class_day_id',
        'status',
    ];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }

    public function classDay()
    {
        return $this->belongsTo(ClassDay::class);
    }
}
