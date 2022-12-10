<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * #type mean if we need in the future more than shape of inputs that like select or multible value
     * type may have several values ==>>  normal , input_text , textarea , multi_select
     * value if we have multi_val we will separate it by , (1,2,3)(this for extend)
     *
     * @return void
     *
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('describe')->nullable();

            $table->string('type')->default('normal');
            $table->string('value')->nullable();

            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('SET NULL');

            $table->softDeletes();
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
        Schema::dropIfExists('proberties');
    }
};
