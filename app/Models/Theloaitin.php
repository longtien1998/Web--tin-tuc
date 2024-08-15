<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theloaitin extends Model
{
    use HasFactory;
    protected $table = 'Theloaitin';
    protected $fillable = [
        'ten',
        'url',
        'lang',
        'thuTu'
    ];
}
