<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function Pengeluaran_Barang()
    {
        return $this->hasMany(Pengeluaranbarang::class, 'item_id');
    }
    public function Penerimaan_Barang()
    {
        return $this->hasMany(Penerimaanbarang::class, 'item_id');
    }

}
