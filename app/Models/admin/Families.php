<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Families extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cien_name', 'description'];
}
