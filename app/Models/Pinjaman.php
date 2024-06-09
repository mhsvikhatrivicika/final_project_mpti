<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pinjaman extends Model
{
    // Nama tabel dalam database
    protected $table = 'pinjaman';

    // Primary key dari tabel
    protected $primaryKey = 'id_pinjaman';

    // Tipe primary key, jika bukan integer
    public $incrementing = true;

    // Tipe primary key, jika bukan integer
    protected $keyType = 'int';

    // Timestamp management, jika tidak menggunakan timestamp
    public $timestamps = true;

    // Kolom-kolom yang dapat diisi massal
    protected $fillable = [
        'id_member',
        'tanggal_transaksi',
        'tanggal_pinjam',
        'lama_pinjam',
        'tanggal_kembali',
        'status_pinjam',
        'catatan_ditolak',
    ];

    // Cast attributes ke tipe data yang benar
    protected $casts = [
        'tanggal_transaksi' => 'date',
        'tanggal_pinjam' => 'date',
        'tanggal_kembali' => 'date',
        'status_pinjam' => 'string',
    ];

    /**
     * Definisi relasi ke model User (anggota yang meminjam).
     * Relasi ini menunjukkan bahwa setiap pinjaman dimiliki oleh satu anggota.
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_member');
    }

    /**
     * Definisi relasi ke model TbRequestBarang (barang-barang yang dipinjam).
     * Relasi ini menunjukkan bahwa setiap pinjaman bisa memiliki banyak barang.
     */
    public function requests(): HasMany
    {
        return $this->hasMany(TbRequestBarang::class, 'id_pinjaman');
    }

    // Optional: Definisi scope query untuk memudahkan pengambilan data berdasarkan status
    public function scopeStatus($query, $status)
    {
        return $query->where('status_pinjam', $status);
    }
}
