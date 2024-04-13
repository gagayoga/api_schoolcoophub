<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    public $incrementing = true;
    protected $table = 'kategori';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $guarded = ['id'];
}
