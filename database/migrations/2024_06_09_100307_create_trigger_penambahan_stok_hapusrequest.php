<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTriggerPenambahanStokHapusrequest extends Migration
{
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER penambahan_stok_hapusrequest BEFORE DELETE ON tb_request_barang
            FOR EACH ROW BEGIN
                UPDATE data_barang
                SET jmlh_stok = jmlh_stok + OLD.jumlah_brg
                WHERE id = OLD.id_barang;
            END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS penambahan_stok_hapusrequest');
    }
}
