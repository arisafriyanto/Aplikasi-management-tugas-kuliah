<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('semester_id');
            $table->string('uts');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->string('file_uts')->nullable();
            $table->text('keterangan_uts');
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
        Schema::dropIfExists('uts');
    }
}
