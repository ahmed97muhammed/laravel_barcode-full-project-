<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvoiceContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_content', function (Blueprint $table) {
            $table->increments('invoice_cont_id');
            
            $table->string('product_name')->nullable();
            $table->float('product_selling_price',11,2)->nullable();
            $table->float('total',11,2)->nullable();
            $table->string('product_quantity')->nullable();

            $table->unsignedBigInteger('related_invoice_id');
            
            $table->foreign('related_invoice_id')->references('id')->on('invoices')->onDelete('cascade');
          
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_content');
    }
}
