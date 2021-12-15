<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVaccineToAppointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appoints', function (Blueprint $table) {
            $table->foreignId("vaccine_id")->constrained('vaccines')->cascadeOnDelete()->cascadeOnUpdate();
            $table->primary(['user_id','admin_id','vaccine_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appoints', function (Blueprint $table) {
            //
            $table->dropColumn("vaccine_id");
        });
    }
}
