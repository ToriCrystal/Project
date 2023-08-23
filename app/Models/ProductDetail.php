<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    protected $table = 'sanphamchitiet';
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_sp');
    }

    protected $fillable = ['RAM', 'CPU', 'Dia', 'Mausac', 'Cannang'];
}
