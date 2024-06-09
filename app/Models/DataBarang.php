<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang terkait dengan model ini
    protected $table = 'data_barang';

    // Tentukan primary key tabel
    protected $primaryKey = 'id';

    // Nonaktifkan timestamp jika tabel tidak menggunakan created_at dan updated_at
    public $timestamps = true;

    // Tentukan atribut yang dapat diisi secara massal
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'tipe_barang',
        'jmlh_stok',
        'lokasi',
        'tgl_regist',
    ];

    // Tentukan atribut yang harus dikast ke tipe data tertentu
    protected $casts = [
        'tgl_regist' => 'date',
    ];

    // Relasi yang mungkin jika tabel lain terkait dengan data_barang
    // public function relatedModel()
    // {
    //     return $this->hasMany(RelatedModel::class, 'foreign_key', 'local_key');
    // }
}
