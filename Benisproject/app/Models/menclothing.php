<?php

namespace App\Models;

$fillable = ['categories','colour', 'description'];

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menclothing extends Model
{
    use HasFactory;
}
