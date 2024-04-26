<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stockkeluar extends Model
{
    use HasFactory;
    public $incrementing = true;
    protected $table = 'stock_keluar';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $guarded = ['id'];

    protected $fillable = [
        'id_user',
        'id_stock',
        'jumlah',
        'total_harga',
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'id_stock');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
