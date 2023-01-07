<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('reference')->nullable();
            $table->string('tracking_number')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('requested_by')->nullable();
            $table->string('cod_amount')->nullable();
            $table->string('declared_value')->nullable();
            $table->string('currency')->nullable();
            $table->string('delivery_name')->nullable();
            $table->string('delivery_email')->nullable();
            $table->string('delivery_city')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('delivery_neighbourhood')->nullable();
            $table->string('delivery_postcode')->nullable();
            $table->string('delivery_country')->nullable();
            $table->string('delivery_phone')->nullable();
            $table->string('delivery_description')->nullable();
            $table->string('collection_name')->nullable();
            $table->string('collection_email')->nullable();
            $table->string('collection_city')->nullable();
            $table->string('collection_address')->nullable();
            $table->string('collection_postcode')->nullable();
            $table->string('collection_country')->nullable();
            $table->string('collection_phone')->nullable();
            $table->string('collection_description')->nullable();
            $table->string('submission_date')->nullable();
            $table->string('pickup_date')->nullable();
            $table->string('received_at')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('weight')->nullable();
            $table->string('pieces')->nullable();
            $table->string('items_count')->nullable();
            $table->string('status_label')->nullable();
            $table->string('reason_en')->nullable();
            $table->string('reason_ar')->nullable();
            $table->string('is_reverse_pickup')->nullable();
            $table->string('is_insured')->nullable();
            $table->string('is_prepaid')->nullable();
            $table->string('payment_method')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
