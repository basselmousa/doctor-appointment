<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsVaccines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors_vaccines', function (Blueprint $table) {
            $table->foreignId('admin_id')->constrained('admins')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('vaccine_id')->constrained('vaccines')->cascadeOnDelete()->cascadeOnUpdate();
            $table->primary(['admin_id', 'vaccine_id']);
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
        Schema::dropIfExists('doctors_vaccines');
    }
}
