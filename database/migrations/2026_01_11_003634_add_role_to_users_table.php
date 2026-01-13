<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::table('users', function (Blueprint $table) {
        $table->string('nama_lengkap', 100)->after('password');
        $table->enum('role', ['admin', 'kasir'])->after('nama_lengkap');
    });
    }

    /**
     * Reverse the migrations.
     */
   public function down()
    {
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['nama_lengkap', 'role']);
    });
    }
};
