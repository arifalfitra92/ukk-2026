<?php

namespace App\Models;

use Sakuci\Database\Model;

class Peminjam extends Model
{
    protected static ?string $table = 'peminjams';

    protected string $primaryKey = 'id_peminjam';

    protected array $fillable = [
        'nis',
        'nama_peminjam',
        'kelas'
    ];
}
