<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations'; // pastikan ini plural

    protected $fillable = [
        'title',
        'school',
        'start_year',
        'end_year',
    ];
}
