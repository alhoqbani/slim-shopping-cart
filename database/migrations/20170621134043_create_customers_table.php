<?php

use App\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration
{


    public function up()
    {
        $this->schema->create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
    
            $table->timestamps();
    
        });
    }
    
    public function down()
    {
        $this->schema->dropIfExists('customers');
    }
    
}
