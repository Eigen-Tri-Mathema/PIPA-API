<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrigger3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER `in_up_stok` BEFORE UPDATE ON `ins`
        FOR EACH ROW BEGIN
        UPDATE items SET stok = (stok-old.jumlah)+new.jumlah
        WHERE id = new.item_id;
        END
        ');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trigger3');
    }
}
