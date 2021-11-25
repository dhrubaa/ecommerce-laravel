<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Product extends Model
{
    use HasFactory, Notifiable;

    protected $table ='products';
    protected $fillable = [
        'p_name',
        'description',
        'brand',
        'price',
        'quantity',
        'alert_stock',
    ];
}