<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->string('nis', 8)->unique();
            $table->string('name');
            $table->enum('jk', ['L', 'P']);
            $table->string('temp_lahir');
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->string('asal_sekolah');
            $table->enum('kelas', ['10', '11', '12']);
            $table->uuid('jurusan_id');
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
        Schema::dropIfExists('siswas');
    }
}
