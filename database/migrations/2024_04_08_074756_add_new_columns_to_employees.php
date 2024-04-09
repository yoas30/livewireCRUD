<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('employees', function (Blueprint $table) {;
            $table->string('nik')->after('id');
            $table->string('nokk')->after('nik');
            $table->string('sarjana')->after('nama');
            $table->string('kelamin')->after('sarjana');
            $table->string('tempatlahir')->after('kelamin');
            $table->string('agama')->after('tempatlahir');
            $table->string('kawin')->after('agama');
            $table->string('nohp')->after('alamat'); //bener
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('nik','nokk','sarjana','kelamin','tempatlahir','agama',
            'kawin','nohp');
            
        });
    }
};
