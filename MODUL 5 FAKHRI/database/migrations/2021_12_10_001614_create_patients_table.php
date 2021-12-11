<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            // $table->unsignedInteger("vaccine_id");
            // $table->foreign("vaccine_id")->references("id")->on("vaccines");
            $table->foreignId("vaccine_id")->constrained("vaccines");
            $table->string("name", 255);
            $table->string("nik", 255);
            $table->string("alamat", 255);
            $table->string("image_ktp", 255);
            $table->string("no_hp", 255);
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
        Schema::dropIfExists('patients');
    }
}
