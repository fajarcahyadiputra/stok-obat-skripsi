<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $table = 'detail_transaksi';
    protected $fillable = ['kode_obat', 'nomer_faktur', 'satuan_id', 'nama_obat', 'harga_satuan', 'total_harga', 'jumlah', 'stok_sebelumnya', 'sisa_stok'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];
    public function obat()
    {
        return $this->belongsTo(Obat::class, "kode_obat");
    }
    public function satuan()
    {
        return $this->hasOne(Satuan::class, "id", "satuan_id");
    }
}
