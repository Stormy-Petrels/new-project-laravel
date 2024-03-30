<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToBookings extends Migration
{
    public function up()
    {
        Schema::table('booking', function (Blueprint $table) {
            $table->string('status')->default('processing');
        });
    }

    public function down()
    {
        Schema::table('booking', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}