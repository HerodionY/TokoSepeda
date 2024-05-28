<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->index();
            $table->string('sku')->unique();
            $table->string('type');
            $table->string('name');
            $table->string('slug');
            $table->decimal('price', 15, 2)->nullable();
            $table->decimal('sale_price', 15, 2)->nullable();
            $table->string('status');
            $table->string('stock_status')->default('IN_STOCK');
            $table->boolean('manage_stock')->default(false);
            $table->datetime('publish_date')->nullable()->index();
            $table->text('excerpt')->nullable();
            $table->text('body')->nullable();
            $table->json('metas')->nullable();
            $table->string('featured_image')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('shop_orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->index();
            $table->string('code')->unique();
            $table->string('status');
            $table->uuid('approved_by')->nullable();
            $table->datetime('approved_at')->nullable();
            $table->uuid('cancelled_by')->nullable();
            $table->datetime('cancelled_at')->nullable();
            $table->text('cancellation_note')->nullable();
            $table->datetime('order_date');
            $table->datetime('payment_due');
            $table->decimal('base_total_price', 16, 2)->default(0);
            $table->decimal('tax_amount', 16, 2)->default(0);
            $table->decimal('tax_percent', 16, 2)->default(0);
            $table->decimal('discount_amount', 16, 2)->default(0);
            $table->decimal('discount_percent', 16, 2)->default(0);
            $table->decimal('shipping_cost', 16, 2)->default(0);
            $table->decimal('grand_total', 16, 2)->default(0);
            $table->text('customer_note')->nullable();
            $table->string('customer_first_name');
            $table->string('customer_last_name');
            $table->string('customer_address1')->nullable();
            $table->string('customer_address2')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_city')->nullable();
            $table->string('customer_province')->nullable();
            $table->integer('customer_postcode')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('approved_by')->references('id')->on('users');
            $table->foreign('cancelled_by')->references('id')->on('users');
        });

        Schema::create('shop_order_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('order_id')->index();
            $table->uuid('product_id')->index();
            $table->integer('qty');
            $table->decimal('base_price', 16, 2)->default(0);
            $table->decimal('base_total', 16, 2)->default(0);
            $table->decimal('tax_amount', 16, 2)->default(0);
            $table->decimal('tax_percent', 16, 2)->default(0);
            $table->decimal('discount_amount', 16, 2)->default(0);
            $table->decimal('discount_percent', 16, 2)->default(0);
            $table->decimal('sub_total', 16, 2)->default(0);
            $table->string('sku');
            $table->string('type');
            $table->string('name');
            $table->json('attributes');
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('shop_orders');
            $table->foreign('product_id')->references('id')->on('shop_products');
        });

        Schema::create('shop_addresses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->index();
            $table->boolean('is_primary')->default(false);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->integer('postcode')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
        
        

        
        
        
    }

   
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_orders');
        Schema::dropIfExists('shop_addresses');
        Schema::dropIfExists('shop_products');
        Schema::dropIfExists('shop_order_items');
        
    }
};
