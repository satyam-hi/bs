<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'tittle',
        'pdf',
        'image',
        'plan',
        'sellCount',
        'publication',
    ];
}
