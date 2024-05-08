<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestMark extends Model
{
    use HasFactory;

    protected $fillable = ['registration_id', 'test_id', 'mark'];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
