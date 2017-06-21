<?php

use App\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentsTable extends Migration
{
    
    
    public function up()
    {
        $this->schema->create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->boolean('failed')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('postal_code');
            
            $table->timestamps();
            
        });
        
        
    }
    
    public function down()
    {
        $this->schema->dropIfExists('payments');
    }
    
}
