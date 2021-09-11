<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('customer');
            $table->string('custid');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->float('cost')->nullable();
            $table->string('description');
            $table->string('recepient');
            $table->string('recpphone');
            $table->string('dimentions');
            $table->string('street');
            $table->string('city');
            $table->string('postcode');
            $table->integer('quantity');
            $table->float('weight',8,2);
            $table->string('status')->default('Request');
            $table->bigInteger('shipment_id')->unsigned();
            $table->foreign('shipment_id')->references('id')->on('shipments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
