<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    
    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
        'item_code', 'item_name', 'item_description',
    ];
}
