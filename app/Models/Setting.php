<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','phone','email','logo','favico','facebook','twitter','instagram','youtube','tiktok'];
}
