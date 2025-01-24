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
        Schema::create('sub_services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_id');
            $table->string('name', 255);
            $table->string('description', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table
                ->enum('status', ['Active', 'Inactive'])
                ->default('Active')
                ->nullable();
            $table->double('price');
            $table->boolean('has_template');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table
                ->foreign('service_id')
                ->references('id')
                ->on('services')
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
        Schema::dropIfExists('sub_services');
    }
};
