<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'loai';
    protected $primaryKey = 'id_loai';
    protected $fillable = ['id_loai', 'ten_loai', 'thutu', 'anhien'];

    public function products()
    {
        return $this->hasMany(Product::class, 'id_loai', 'id_sp');
    }
}
