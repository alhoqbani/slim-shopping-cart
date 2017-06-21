<?php

use App\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddresseesTable extends Migration
{


    public function up()
    {
        $this->schema->create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('postal_code');
        
            $table->timestamps();
        
        });
    
    
    }
    
    public function down()
    {
        $this->schema->dropIfExists('addresses');
    }
    
}
