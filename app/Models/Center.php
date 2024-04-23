<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address'];

    public function tuitionClasses()
    {
        return $this->hasMany(TuitionClass::class);
    }
}
