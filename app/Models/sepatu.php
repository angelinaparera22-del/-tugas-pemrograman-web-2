<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'brand', 'size', 'price', 'stock'])]
class sepatu extends Model
{
    /** @use HasFactory<\Database\Factories\SepatuFactory> */
    use HasFactory;
    
    //protected $fillable = ['name', 'brand', 'size', 'price', 'stock'];

    //protected $guarded = ['id'];
}
