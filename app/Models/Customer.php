<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customer";
    protected $keyType = 'string';
    protected $primaryKey = 'nik';
    protected $fillable = ['nik', 'nama', 'nomer_tlpn', "alamat"];
}
