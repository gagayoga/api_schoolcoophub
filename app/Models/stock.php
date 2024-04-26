<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    public $incrementing = true;
    protected $table = 'stock';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $guarded = ['id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }

    public function stockKeluar()
    {
        return $this->hasMany(StockKeluar::class, 'id_stock');
    }
}
