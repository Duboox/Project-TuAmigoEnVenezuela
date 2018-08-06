<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_client');
            $table->string('id_agent');
            $table->date('exit_date');
            $table->date('arrival_date');
            $table->integer('price');
            $table->timestamps();
            $table->softDeletes();
            // Relations
            $table->integer('id_ticket_type')->unsigned();
            $table->foreign('id_ticket_type')
                    ->references('id')
                    ->on('ticket_types')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
