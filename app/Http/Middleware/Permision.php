<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Permision
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if (auth()->user()->role != 'admin') {
        //     $admin = ['home',  "obat", "obat/{$request->route()->parameter('id')}", "satuan", "satuan/{$request->route()->parameter('id')}"];
        //     $gudang = ['home', "tambah-barang-keluar", 'order', 'barang-keluar', 'laporan', 'barang', "order/ready-stok/{$request->route()->parameter('id')}", "order/stok-notready/{$request->route()->parameter('id')}", "edit-barang-keluar/{$request->route()->parameter('id')}", "barang-keluar/{$request->route()->parameter('barang_keluar')}", "detail-barang-keluar/{$request->route()->parameter('id')}", "export-laporan"];
        //     $sales = ['home', 'order', 'customer', "order/{$request->route()->parameter('order')}", "customer/{$request->route()->parameter('customer')}"];
        //     switch (auth()->user()->role) {
        //         case 'admin':
        //             $arrayRole = $admin;
        //             break;
        //         case 'gudang':
        //             $arrayRole = $gudang;
        //             break;
        //         case 'sales':
        //             $arrayRole = $sales;
        //             break;
        //     }
        //     if (!in_array($request->path(), $arrayRole)) {
        //         return abort(403, $request->path() . $request->route()->parameter('id'));
        //     }
        // }
        return $next($request);
    }
}
