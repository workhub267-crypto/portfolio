<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class About extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'profile_image',
        'resume_file',
        'experience_years'
    ];
}
