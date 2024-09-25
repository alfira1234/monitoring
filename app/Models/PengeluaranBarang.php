<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengeluaranBarang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function item()
    {
        return $this->belongsTo(item::class, 'item_id');
    }
}
