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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('service_id');
            $table->bigInteger('package_id');
            $table->bigInteger('delivery_id');
            $table->bigInteger('template_id')->nullable();
            $table
                ->enum('status', ['Rejected', 'Approvad'])
                ->default('Pending');
            $table->dateTime('booking_date');
            $table->decimal('total_price');
            $table->text('text');
            $table->text('note')->nullable();
            $table->boolean('own_domain')->nullable();
            $table->string('domain_url')->nullable();
            $table->string('payment_method');
            $table->string('payment_status');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('delivery_id')
                ->references('id')
                ->on('delivery_days')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('package_id')
                ->references('id')
                ->on('sub_services')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('template_id')
                ->references('id')
                ->on('sub_service_templates')
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
        Schema::dropIfExists('bookings');
    }
};
