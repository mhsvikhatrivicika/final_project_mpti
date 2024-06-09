<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use Notifiable, HasFactory;

    // Nama tabel yang diwakili oleh model ini
    protected $table = 'users';

    // Primary Key untuk tabel users
    protected $primaryKey = 'id';

    // Apakah primary key auto increment
    public $incrementing = true;

    // Tipe data primary key (opsional, jika id adalah integer default, bisa diabaikan)
    protected $keyType = 'int';

    // Apakah timestamps digunakan (created_at dan updated_at)
    public $timestamps = true;

    // Kolom-kolom yang boleh diisi secara massal
    protected $fillable = [
        'username',
        'password',
        'role',
        'nama',
    ];

    // Kolom-kolom yang harus disembunyikan dalam serialisasi, seperti untuk API
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Jika role memiliki tipe data ENUM atau CHAR yang ditentukan, bisa menggunakan casts
    protected $casts = [
        'role' => 'char',
    ];

    // Relasi dengan model lainnya bisa ditambahkan di sini (contoh: posts, comments, dsb.)
    // Misalnya, jika user memiliki banyak pinjaman:
    // public function pinjaman()
    // {
    //     return $this->hasMany(Pinjaman::class, 'id_member', 'id');
    // }
}
