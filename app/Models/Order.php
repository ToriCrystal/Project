<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'donhang';
    protected $dates = ['thoidiemmua'];
    protected $fillable = ['id_dh', 'id_user', 'tennguoinhan', 'dienthoai', 'diachigiaohang', 'trangthai'];
    protected $primary_Key = 'id_dh';
    public $timestamps = false;


    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'id_dh');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
