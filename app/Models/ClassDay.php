<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'registration_id',
    ];

    public function tuitionClass()
    {
        return $this->belongsTo(TuitionClass::class);
    }

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
