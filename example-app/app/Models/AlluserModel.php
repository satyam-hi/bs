<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlluserModel extends Model
{
    use HasFactory;
    protected $table = 'allUsers';

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'items',
    ];
}
