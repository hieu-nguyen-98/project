<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','status','payment_method','payment_status','payment_id','total_price','address','phone','email','name','surname','city','postal_code','country','shipping_price'];
}
