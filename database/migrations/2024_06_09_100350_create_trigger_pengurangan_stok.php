<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTriggerPenguranganStok extends Migration
{
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER pengurangan_stok AFTER INSERT ON tb_request_barang
            FOR EACH ROW BEGIN
                UPDATE data_barang
                SET jmlh_stok = jmlh_stok - NEW.jumlah_brg
                WHERE id = NEW.id_barang;
            END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS pengurangan_stok');
    }
}
