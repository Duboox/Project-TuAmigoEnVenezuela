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
            $table->string('correlative');
            $table->string('id_client');
            $table->string('id_agent');
            $table->integer('luggage');
            $table->integer('hand_luggage');
            $table->string('origin');
            $table->string('destination');
            $table->integer('adults');
            $table->integer('kids');
            $table->integer('bebys');
            $table->date('exit_date');
            $table->string('exit_time');
            $table->date('arrival_date');
            $table->integer('exit_rate');
            $table->integer('price');
            $table->timestamps();
            $table->softDeletes();

            // Relations
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
