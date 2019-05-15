<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoucherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('name')->nullable();
            $table->string('departure')->nullable();
            $table->string('destination')->nullable();
            $table->string('price')->nullable();
            $table->longText('link_detail')->nullable();
            $table->longText('transport')->nullable();
            $table->longText('location')->nullable();
            $table->string('supplier')->nullable();
            $table->string('time')->nullable();
            $table->longText('schedule')->nullable();
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
        Schema::dropIfExists('voucher');
    }
}
