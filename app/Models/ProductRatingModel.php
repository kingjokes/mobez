<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRatingModel extends Model
{
    use HasFactory;

    protected $table = 'products_rating';

    protected $guarded = [];
}
