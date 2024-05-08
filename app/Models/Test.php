<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = ['tuition_class_id', 'date', 'type'];

    public function tuitionClass()
    {
        return $this->belongsTo(TuitionClass::class);
    }

    public function testMarks()
    {
        return $this->hasMany(TestMark::class);
    }
}
