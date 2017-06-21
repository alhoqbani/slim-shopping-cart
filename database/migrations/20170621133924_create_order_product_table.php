<?php

use App\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderProductTable extends Migration
{
    
    
    
    public function up()
    {
        $this->schema->create('orders_products', function (Blueprint $table) {
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('quantity');
        });
        
        
    }
    
    public function down()
    {
        $this->schema->dropIfExists('orders_products');
    }
}
