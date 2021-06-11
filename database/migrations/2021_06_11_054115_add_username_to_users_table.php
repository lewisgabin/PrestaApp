<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsernameToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string("apellido", '50')->after('nombre');
            $table->string('image','120')->nullable()->after('email');
            $table->string('rol','20');
            $table->boolean('estado');
            $table->string("usuario", '30')->after('apellido');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('apellido');
            $table->dropColumn('image');
            $table->dropColumn('estado');
            $table->dropColumn('rol');
            $table->dropColumn('usuario');
        });
    }
}
