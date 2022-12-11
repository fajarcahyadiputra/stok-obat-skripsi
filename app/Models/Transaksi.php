<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $keyType = 'string';
    protected $primaryKey = 'nomer_faktur';
    protected $fillable = ['nomer_faktur', 'kasir', 'nik', 'tanggal_transaksi', 'sub_total', 'status_transaksi', 'keterangan'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];
    public static function generateNoFaktur()
    {
        $kode_max = DB::select("SELECT MAX(RIGHT(nomer_faktur,4)) as kode_max FROM transaksi");
        if ($kode_max) {
            $kode_max =  collect($kode_max)->pluck('kode_max')->toArray()[0];
            $kode_interval =  (int) $kode_max + 1;
        } else {
            $kode_interval =  1;
        }
        return 'FKR' . "-" . str_pad($kode_interval, 4, '0', STR_PAD_LEFT) . "-" . time();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'kasir');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'nik');
    }
}
