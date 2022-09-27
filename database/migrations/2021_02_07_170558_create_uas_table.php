<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('semester_id');
            $table->string('uas');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->string('file_uas')->nullable();
            $table->text('keterangan_uas');
            $table->string('status');
            $table->string('file_answer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uas');
    }
}
