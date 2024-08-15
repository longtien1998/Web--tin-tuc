<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'tin';
    protected $fillable = [
        'tieuDe',
        'lang',
        'url',
        'moTa',
        'hinhAnh',
        'noiDung',
        'loaiTinId',
        'nguoiDangId',
        'noiBat',
        'anHien',
        'tags'
    ];
}
