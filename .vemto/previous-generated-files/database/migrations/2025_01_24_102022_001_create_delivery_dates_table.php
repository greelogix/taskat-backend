<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_dates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sub_service_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->double('price')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table
                ->foreign('sub_service_id')
                ->references('id')
                ->on('sub_services')
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
        Schema::dropIfExists('delivery_dates');
    }
};
