<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $primary_Key = 'id_sp';
    protected $fillable = ['id_sp', 'content'];
    public $timestamps;
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_sp');
    }
}
