<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appoints', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("admin_id")->constrained('admins')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamp('time');
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
        Schema::dropIfExists('appoints');
    }
}
