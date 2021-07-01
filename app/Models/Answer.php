<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table="e_answers";
    
    use HasFactory;

    protected $fillable = [
        'q_id', 'option_number'
    ];

    protected $except = [
        'api/*',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
