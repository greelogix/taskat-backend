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
        Schema::dropIfExists('sub_service_templates');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('sub_service_templates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sub_service_id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('image', 255)->nullable();
            $table->string('url', 255)->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->bigInteger('SUB_service_id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table
                ->foreign('SUB_service_id')
                ->references('id')
                ->on('sub_services')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }
};
