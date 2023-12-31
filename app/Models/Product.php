<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "id_category",
        "name",
        "image",
        "price",
        "describe",
        "screen",
        "cpu",
        "card",
        "battery",
        "mass",
        'ram',
        'memory'
    ];

    public function getSlug() {
        return Str::slug($this->name ?? '');
    }
}
