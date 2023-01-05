<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysAdvanteUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advante_user', function (Blueprint $table) {
            $table->foreign('service_id', 'fk_advante_user_to_service')->references('id')
            ->on('service')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advante_user', function (Blueprint $table) {
            $table->dropForeign('fk_advante_user_to_service');
        });
    }
}
