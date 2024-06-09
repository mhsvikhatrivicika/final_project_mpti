<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestBarang extends Model
{
    protected $table = 'tb_request_barang';

    protected $primaryKey = 'id_request';

    protected $fillable = [
        'id_pinjaman',
        'id_barang',
        'jumlah_brg',
    ];

    public $timestamps = true;

    public function pinjaman()
    {
        return $this->belongsTo('App\Models\Pinjaman', 'id_pinjaman', 'id_pinjaman');
    }

    public function barang()
    {
        return $this->belongsTo('App\Models\DataBarang', 'id_barang', 'id');
    }
}
