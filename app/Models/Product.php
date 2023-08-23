<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function productDetail()
    {
        return $this->hasOne(ProductDetail::class, 'id_sp', 'id_sp');
    }


    public function category()
    {
        return $this->belongsTo(Category::class, 'id_loai', 'id_loai');
    }

    public function loai()
    {
        return $this->belongsTo(Category::class, 'id_loai');
    }

    use HasFactory;
    protected $table = 'sanpham';
    protected $primaryKey = 'id_sp';
    protected $fillable = ['id_sp', 'ten_sp', 'hinh', 'gia', 'gia_km', 'mota'];
    public $timestamps = false;

}
