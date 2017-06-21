<?php

use App\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderssTable extends Migration
{
    
    
    
    
    public function up()
    {
        $this->schema->create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hash');
            $table->float('total');
            $table->boolean('paid');
            $table->unsignedInteger('address_id');
            $table->unsignedInteger('customer_id');
            $table->string('name');
    
    
            $table->timestamps();
        });
        
        
    }
    
    public function down()
    {
        $this->schema->dropIfExists('orders');
    }
    
}
