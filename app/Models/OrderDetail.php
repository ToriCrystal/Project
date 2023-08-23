<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'donhangchitiet';
    protected $fillable = ['id_ct', 'id_dh', 'id_sp', 'ten_sp', 'soluong', 'gia'];
    protected $primary_Key = 'id_ct';
    public $timestamps = false;
    public function order()
    {
        return $this->belongsTo(Order::class, 'id_dh', 'id');
    }

    // Định nghĩa quan hệ với model Product (nếu bạn muốn)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
