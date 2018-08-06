<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_services', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            // Relations
            $table->integer('id_invoice')->unsigned();
            $table->foreign('id_invoice')
                    ->references('id')
                    ->on('invoices')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->integer('id_service')->unsigned();
            $table->foreign('id_service')
                    ->references('id')
                    ->on('services')
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
        Schema::dropIfExists('invoice_services');
    }
}
