<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class ObatMasuk extends Model
{
    use HasFactory;
    protected $table = 'obat_masuk';
    protected $fillable = ['kode_obat', 'supplier_id', 'satuan_id', 'jumlah', 'jumlah_sebelumnya', 'total_stok', 'penerima'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'kode_obat');
    }
    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    public static function laporan($dari, $sampai)
    {
        return DB::table("obat_masuk")
            ->select("obat_masuk.*", "obat.nama AS nama_obat", "supplier.nama AS nama_supplier", "satuan.satuan")
            ->join('obat', "obat.kode_obat", "=", "obat_masuk.kode_obat")
            ->join('supplier', "obat_masuk.supplier_id", "=", "supplier.id")
            ->join('satuan', "obat_masuk.satuan_id", "=", "satuan.id")
            ->whereBetween('obat_masuk.created_at', [$dari, $sampai])
            ->get();
    }
}
